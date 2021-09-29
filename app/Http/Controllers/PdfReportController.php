<?php

namespace App\Http\Controllers;

use App\Jas;
use App\Models\APK_SDK;
use App\Models\Operational_safety;
use App\Models\Ref_obj;
use App\Models\Report_history\ElementStatus_day;
use App\Models\Report_history\QualityCriteria;
use App\Models\Report_history\RepiatReport;
use App\Models\Report_history\ResultPk;
use App\Models\Report_history\ScenaReport;
use App\Models\Report_history\StatusOpo;
use App\Models\Report_history\ViolationsReport;
use App\Models\Rtn\Data_check_out;
use App\Models\XML_journal;
use App\Ref_opo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class PdfReportController extends Controller
{
    public function pdf_xml_journal($start, $finish)
    {
        $ver_opo =  XML_journal::where('date', '<=', $finish)->where('date', '>=', $start)->orderByDesc('id')->get();
        $i = 0;
        if (empty($ver_opo->first()->fullDescOPO)){
            $data['fullDescOPO'][$i] = "";
            $data['regNumOPO'][$i] = " ";
            $data['ip_opo'][$i] = " ";
            $data['status'][$i] = " ";
            $data['date'][$i] = " ";
            $data['time'][$i] = " ";
            $data['id'][$i] = "Журнал пуст";
        } else{
            foreach ($ver_opo as $ver){
                $data['fullDescOPO'][$i] = $ver->fullDescOPO;
                $data['regNumOPO'][$i] = $ver->regNumOPO;
                $data['ip_opo'][$i] = $ver->ip_opo;
                $data['status'][$i] = $ver->status;
                $data['date'][$i] = $ver->date;
                $data['time'][$i] = $ver->time;
                $data['id'][$i] = $ver->id;
                $i++;
            }
        }

        $data['title'] = 'Журнал отправки XML в период с'.' '.$start. 'по'.' '. $finish;
        $patch = 'xml_journal' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_xml_journal', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }



    public function pdf_elem($start, $finish)
    {
        $i = 0;
        $j = 0;
        $input = Ref_obj::where('InUse','=','1')->where('status', '=', '50')->orderby('idObj')->get();
        foreach ($input as $row){
            $desc_opo[$j] = $row->obj_to_opo->descOPO;
            $name_obj[$j] = $row->nameObj;
            foreach ($row->elem_to_calc_report as $rows){
                if($rows->date <= $finish && $rows->date >= $start){
                    $ip[$j][$i] = $rows->ip_elem;
                    $m[$j][$i] = $rows->op_m;
                    $el[$j][$i] = $rows->op_el;
                    $r[$j][$i] = $rows->op_r;
                    $i++;
                }
            }
            $ip_elem[$j] = min($ip[$j]);
            $op_m[$j] = min($m[$j]);
            $op_el[$j] = min($el[$j]);
            $op_r[$j] = min($r[$j]);
            $j++;
        }
        $data['desc_opo'] = $desc_opo;
        $data['name_obj'] = $name_obj;
        $data['ip_elem'] = $ip_elem;
        $data['op_m'] = $op_m;
        $data['op_el'] = $op_el;
        $data['op_r'] = $op_r;
        $data['title'] = 'Отчет о состоянии элементов опасных производственных объектов в период с'.' '.$start. 'по'.' '. $finish;
        $patch = 'status_elem' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_elem', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_elem_term($start, $finish, $term)
    {
        $data = ElementStatus_day::where('date', '=', $start)->where('type', '=', $term)->get();
        $title = 'Отчет о состоянии элементов опасных производственных объектов в период с'.' '.$start. 'по'.' '. $finish;
        $patch = 'status_elem' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_elem_term', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function opo_pdf($start, $finish_fact)
    {
        $finish = date("Y-m-d H", strtotime($finish_fact.'+ 24 hour'));
        $title = 'Отчет о состоянии элементов опасных производственных объектов в период с '.' '.$start. 'по'.' '. $finish_fact;
        foreach (Ref_opo::orderby('idOPO')->get() as $rows1) {
            $name_opos = $rows1->descOPO;

            $ip_opos = $rows1->opo_to_calc_period_min->where('date', '>=', $start)->where('date', '<=', $finish_fact)->first()->ip_opo;

            $ip = 1;
            foreach ($rows1->opo_to_obj as $item) {
                foreach ($item->elem_to_calc_report as $it){
                    if ($it->ip_elem <= $ip) {
                        $ip = $it->ip_elem;
                        $name = $item->nameObj;
                    }
                }
            }

            $data[]=[
                'name_opos' => $name_opos,
                'ip_opos' => $ip_opos,
                'name'=> $name,
                'ip'=>$ip ];
        }

            $patch = 'report_opo' . Carbon::now() . '.pdf';
            $pdf = PDF::loadView('web.docs.reports.pdf.opo_pdf', compact('data', 'title'))->setPaper('a4', 'landscape');
            return $pdf->download($patch);
        }

    public function opo_pdf_term($start, $finish_fact, $term)
    {
        $data = StatusOpo::where('date', '=', $start)->where('type', '=', $term)->get();
        $title = 'Отчет о состоянии элементов опасных производственных объектов в период с '.' '.$start. 'по'.' '. $finish_fact;
        $patch = 'report_opo' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.opo_pdf_term', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }


    public function pdf_scena($start, $finish)
    {
        $data['title'] = 'Отчет о зафиксированных СДК ПБ ОПО сценариях возможных техногенных событий на опасных производственных объектах в период с '.' '.$start.' '.'по'.' '. date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes'));
        $data['rows'] = Jas::orderby('id')->where('data', '<=', date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes')))->where('data', '>=', $start)->get();
        $patch = 'scena ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_scena', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_scena_term($start, $finish, $term)
    {
        $data = ScenaReport::where('date', '=', $start)->where('type', '=', $term)->get();
        $title = 'Отчет о зафиксированных СДК ПБ ОПО сценариях возможных техногенных событий на опасных производственных объектах в период с '.' '.$start.' '.'по'.' '. date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes'));
        $patch = 'scena ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_scena_term', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_result_pk($start, $finish)
    {
        $data['title'] = 'Сведения о результатах проверок, проводимых при осуществлении производственного контроля, устранении нарушений в период с '.' '.$start.' '.'по'.' '. date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes'));
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<=', date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes')))->where('date_check_out', '>=', $start)->get();
        $patch = 'result_pk ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_result_pk', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_result_pk_term($start, $finish, $term)
    {
        $title = 'Сведения о результатах проверок, проводимых при осуществлении производственного контроля, устранении нарушений в период с '.' '.$start.' '.'по'.' '.$finish;
        $data = ResultPk::where('date', '=', $start)->where('type', '=', $term)->get();
        $patch = 'result_pk ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_result_pk_term', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_violations_report($start, $finish)
    {
        $title = 'Отчет о выяленных нарушениях на опасных производственных объектах в период с '.' '.$start.' '.'по'.' '. date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes'));
        $data_all = APK_SDK::orderby('id_apk')->where('daterec', '<', date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes')))->where('daterec', '>', $start)->get();
        $i = 0;
        $data['desc_violation'][$i] = "Данные отсутствуют";
        $data['name_obj'][$i] = '';
        $data['level_km'][$i] = '';
        $data['direction'][$i] = '';
        $data['severity_fatal'][$i] = '';
        $data['infi_repeat'][$i] = '';
        $data['plan_work'][$i] = '';
        $data['plan_date'][$i] = '';
        $data['violation_status'][$i] = '';
        $data['plan_pers'][$i] = '';
        foreach ($data_all as $row) {
            if (isset($row->APK_to_APK)) {
                $data['desc_violation'][$i] = $row->Details;
                $data['name_obj'][$i] = $row->APK_to_elem->nameObj;
                $data['level_km'][$i] = $row->level_km;
                $data['direction'][$i] = $row->APK_to_APK->direction;
                $data['severity_fatal'][$i] = $row->APK_to_APK->severity_fatal;
                $data['infi_repeat'][$i] = $row->APK_to_APK->infi_repeat;
                $data['plan_work'][$i] = $row->APK_to_APK->plan_work;
                $data['plan_date'][$i] = $row->APK_to_APK->plan_date;
                $data['violation_status'][$i] = $row->APK_to_APK->violation_status;
                $data['plan_pers'][$i] = $row->APK_to_APK->plan_pers;
                $i++;
            }
        }
        $patch = 'violations_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_violations_report', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_violations_report_term($start, $finish, $term)
    {
        $data = ViolationsReport::where('date', '=', $start)->where('type', '=', $term)->get();
        $title = 'Отчет о выяленных нарушениях на опасных производственных объектах в период с '.' '.$start.' '.'по'.' '.$finish;
        $patch = 'scena ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_violations_report_term', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

     public function pdf_repair($start, $finish)
    {
        $title = 'Отчет "Анализ повторяемости несоответствий" в период с '.' '.date('Y-m-d', strtotime($start)).' '.'по'.' '. date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes'));
        $id_OPO = 0;
        $id_Obj = 0;
        $id_violation = 0;
        $output_data['name_opo'][$id_OPO] = '';
        $output_data['name_elem'][$id_OPO][$id_Obj] = '';
        $output_data['name_violation'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['num_1_level'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['num_2_level'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['num_3_level'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['num_4_level'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['num_all'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['ok'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['ok_of_all'][$id_OPO][$id_Obj][$id_violation] = '';
        $all_violation = count(APK_SDK::where('daterec', '>', date("Y-m-d", strtotime($start.'- 1 year')))->where('daterec', '<', date("Y-m-d", strtotime($start)))->where('infi_repeat', '!=', '0')->get());
        $data_all = APK_SDK::orderByDesc('id_apk')->where('infi_repeat', '!=', '0')->where('daterec', '<', date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes')))->where('daterec', '>', $start)->get();
        $of_opo = $data_all->groupBy('idOPO');
        foreach ($of_opo as $rows){    //проходимся по записям одного опо
            $id_Obj = 0;
            $of_obj = $rows->groupBy('idObj');
            $output_data['name_opo'][$id_OPO] = Ref_opo::where('idOPO', '=', $rows->first()->idOPO)->first()->descOPO;
            foreach ($of_obj as $row){    //проходимся по записям одного элемента
                $output_data['name_elem'][$id_OPO][$id_Obj] = Ref_obj::where('idObj', '=', $row->first()->idObj)->first()->nameObj;
                $i = 0;
                foreach ($row as $item){   //переписываем для требуемого формата
                    $data[$id_Obj][$i] = $item;
                    $i++;
                }
                $id_violation = 0;
                $of_details = array_count_values(array_column($data[$id_Obj], 'Details'));  //получили массив строк ТЕКСТ НАРУШЕНИЯ-КОЛИЧЕСТВО ОДИНАКОВЫХ СТРОК

                foreach ($of_details as $key => $num_all){
                    $output_data['name_violation'][$id_OPO][$id_Obj][$id_violation] = $key;
                    $output_data['num_all'][$id_OPO][$id_Obj][$id_violation] = $num_all;
                    $output_data['num_1_level'][$id_OPO][$id_Obj][$id_violation] = 0;
                    $output_data['num_2_level'][$id_OPO][$id_Obj][$id_violation] = 0;
                    $output_data['num_3_level'][$id_OPO][$id_Obj][$id_violation] = 0;
                    $output_data['num_4_level'][$id_OPO][$id_Obj][$id_violation] = 0;
                    $output_data['ok'][$id_OPO][$id_Obj][$id_violation] = 0;
                    $data_of_level_km = $row->where('Details', $output_data['name_violation'][$id_OPO][$id_Obj][$id_violation])->all();  //находим все строки с одинаковым нарушением
                    foreach ($data_of_level_km as $level_km){            //пробегаемся для подсчета количества повторных нарушений по уровням
                        if ($level_km->level_km == 1){
                            $output_data['num_1_level'][$id_OPO][$id_Obj][$id_violation] = $output_data['num_1_level'][$id_OPO][$id_Obj][$id_violation] + 1;
                        } elseif ($level_km->level_km == 2){
                            $output_data['num_2_level'][$id_OPO][$id_Obj][$id_violation] = $output_data['num_2_level'][$id_OPO][$id_Obj][$id_violation] + 1;
                        } elseif ($level_km->level_km == 3){
                            $output_data['num_3_level'][$id_OPO][$id_Obj][$id_violation] = $output_data['num_3_level'][$id_OPO][$id_Obj][$id_violation] + 1;
                        } elseif ($level_km->level_km == 4){
                            $output_data['num_4_level'][$id_OPO][$id_Obj][$id_violation] = $output_data['num_4_level'][$id_OPO][$id_Obj][$id_violation] + 1;
                        }
                        if ($level_km->flComplete == 1){
                            $output_data['ok'][$id_OPO][$id_Obj][$id_violation] = $output_data['ok'][$id_OPO][$id_Obj][$id_violation] + 1;
                        }
                    }
                    $output_data['ok'][$id_OPO][$id_Obj][$id_violation] = round($output_data['ok'][$id_OPO][$id_Obj][$id_violation]*100/$output_data['num_all'][$id_OPO][$id_Obj][$id_violation], 2);
                    $output_data['ok_of_all'][$id_OPO][$id_Obj][$id_violation] = '-';
                    $id_violation++;
                }
                $id_Obj++;
            }
            $id_OPO++;
        }

        if ($all_violation != 0 || $all_violation != null){
            for ($id_OPO=0; $id_OPO<count($output_data['name_opo']); $id_OPO++){
                for ($id_obj=0; $id_obj<count($output_data['name_elem'][$id_OPO]); $id_obj++){
                    for ($id_violation=0; $id_violation<count($output_data['name_violation'][$id_OPO][$id_obj]); $id_violation++) {
                        $output_data['ok_of_all'][$id_OPO][$id_obj][$id_violation] = round($output_data['ok'][$id_OPO][$id_obj][$id_violation]*$output_data['num_all'][$id_OPO][$id_obj][$id_violation]/$all_violation, 2);
                    }
                }
            }
        }
        $patch = 'repair_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_repair', compact('output_data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_repair_term($start, $finish, $term)
    {
        $data = RepiatReport::where('date', '=', $start)->where('type', '=', $term)->get();
        $title = 'Отчет "Анализ повторяемости несоответствий" в период с '.' '.$start.' '.'по'.' '.$finish;
        $patch = 'repair_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_repair_term', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_event($start, $finish)
    {
        $title = 'Отчет о проведенных контрольных мероприятиях и выявленных нарушениях в период с '.' '.$start.' '.'по'.' '. date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes'));
        $data_opo = Ref_opo::orderby('idOPO')->get();
        $data_SDK_APK = APK_SDK::orderby('idOPO')->where('daterec', '<', date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes')))->where('daterec', '>', $start)->get();
        for ($i=1; $i<=count($data_opo); $i++){
            $data['name_opo'][$i] = $data_opo->where('idOPO', $i)->first()->descOPO;
            $data['level_1_all'][$i] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 1));
            $data['level_2_all'][$i] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 2));
            $data['level_3_all'][$i] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 3));
            $data['level_4_all'][$i] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 4));
            $data['level_1_ok'][$i] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 1)->where('flComplete', '!=', 0));
            $data['level_2_ok'][$i] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 2)->where('flComplete', '!=', 0));
            $data['level_3_ok'][$i] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 3)->where('flComplete', '!=', 0));
            $data['level_4_ok'][$i] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 4)->where('flComplete', '!=', 0));
            $data['opo_all'][$i] = $data['level_1_all'][$i] + $data['level_2_all'][$i] + $data['level_3_all'][$i] + $data['level_4_all'][$i];
        }
        $patch = 'event_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_event', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_event_term($start, $finish, $term)
    {
        $data = RepiatReport::where('date', '=', $start)->where('type', '=', $term)->get();
        $title = 'Отчет о проведенных контрольных мероприятиях и выявленных нарушениях в период с '.' '.$start.' '.'по'.' '.$finish;
        $patch = 'event_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_event_term', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_effect($quarter, $year)
    {
        $title = 'Отчет об эффективности производственного контроля в период за'.' '.$quarter.' '.'квартал'.$year.' '.'года';
        $data_all = Operational_safety::where('year', $year)->where('quarter', $quarter)->get();
        $i=0;
        foreach ($data_all as $row){
            $data['name_opo'][$i] = Ref_opo::where('idOPO', '=', $row->from_opo)->first()->descOPO;
            $data['p_kr'][$i] = $row->p_kr;
            $data['p_un'][$i] = $row->p_un;
            $data['p_kp'][$i] = $row->p_kp;
            $data['p_pn'][$i] = $row->p_pn;
            $data['p_kd'][$i] = $row->p_kd;
            $data['p_vp'][$i] = $row->p_vp;
            $data['p_ok'][$i] = $row->p_ok;
            $data['r_bf'][$i] = $row->r_bf;
            $data['r_ab'][$i] = $row->r_ab;
            $data['r_go'][$i] = $row->r_go;
            $data['o_pk'][$i] = $row->o_pk;
            $i++;
        }
        $patch = 'effect_pk ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_effect', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_info_act($start, $finish)
    {
        $data['title'] = 'Справка о выполнении актов в период с '.' '.$start.' '.'по'.' '. date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes'));
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<=', $finish)->where('date_check_out', '>=', date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes')))->get();
        $patch = 'info_act ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_info_act', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_act_pb($start, $finish)
    {
        $data['title'] = 'Отчет о состоянии элементов опасных производственных объектов в период с '.' '.$start.' '.'по'.' '. date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes'));
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<=', date("Y-m-d H:i", strtotime($finish.'+ 23 hour 59 minutes')))->where('date_check_out', '>=', $start)->get();
        $patch = 'status_elem' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_act_pb', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_quality_criteria($start, $finish)
    {
        $title = 'Справка о выполнении актов ПБ в период с '.' '.$start.' '.'по'.' '. $finish;
        $data_all = APK_SDK::where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        $OPO_list = Ref_opo::orderBy('idOPO')->get();
        $i = 1;
        $data['name_opo'][$i] = '';
        $data['k1_red'][$i] = '';
        $data['k1_yellow'][$i] = '';
        $data['k1_green'][$i] = '';
        $sum_green = 0;
        $sum_red = 0;
        $sum_yellow = 0;
        for ($i=1; $i<count($OPO_list)+1; $i++){
            $data['name_opo'][$i] = $OPO_list->where('idOPO', $i)->first()->descOPO;
            $data['k1_red'][$i] = count($data_all->where('idOPO', $i)->where('Weight', 6));
            $sum_red = $sum_red + $data['k1_red'][$i];
            $data['k1_yellow'][$i] = count($data_all->where('idOPO', $i)->where('Weight', 0.3));
            $sum_yellow = $sum_yellow + $data['k1_yellow'][$i];
            $data['k1_green'][$i] = count($data_all->where('idOPO', $i)->where('Weight', 0.11));
            $sum_green = $sum_green + $data['k1_green'][$i];
        }
        $sum = ['red' => $sum_red, 'yellow'=> $sum_yellow, 'green'=> $sum_green];
        $patch = 'quality_criteria ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_quality_criteria', compact('data', 'sum', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }

    public function pdf_quality_criteria_term($start, $finish, $term)
    {
        $data = QualityCriteria::where('date', '=', $start)->where('type', '=', $term)->get();
        $title = 'Справка о выполнении актов ПБ в период с '.' '.$start.' '.'по'.' '. $finish;
        $patch = 'quality_criteria ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_quality_criteria_term', compact('data', 'title'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);
    }
}
