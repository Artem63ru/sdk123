<?php

namespace App\Http\Controllers;

use App\Jas;
use App\Models\Ref_obj;
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

    public function opo_pdf($start, $finish)
    {
        $j = 0;
        foreach (Ref_opo::orderby('idOPO')->get() as $rows1) {
            $name_opos = $rows1->descOPO;

            foreach ($rows1->opo_to_calc_period_min->where('date', '>=', $start)->where('date', '<=', $finish)->take(1) as $rows2) {
                $ip_opos = $rows2->ip_opo;
            }

            $ip = 1;
            foreach ($rows1->opo_to_obj as $item) {
                foreach ($item->elem_to_calc_report->where('date', '>=', $start)->where('date', '<=', $finish) as $it){
                    if ($it->ip_elem <= $ip) {
                        $ip = $it->ip_elem;
                        $name = $item->nameObj;
                    }
                }
            }
            $NAME_OPO[$j] = $name_opos;
            $IP_OPO[$j] = $ip_opos;
            $IP_OBJ[$j] = $ip;
            $NAME_OBJ[$j] = $name;
            $j++;
        }
        $data['name_opos'] = $NAME_OPO;
        $data['ip_opos'] = $IP_OPO;
        $data['ip'] = $IP_OBJ;
        $data['name'] = $NAME_OBJ;
        $data['title'] = 'Отчет о состоянии опасных производственных объектов в  период с'.' '.$start.' '. 'по'.' '.$finish;
        $patch = 'report_opo' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.opo_pdf', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_scena($start, $finish)
    {
        $data['title'] = 'Отчет о зафиксированных СДК ПБ ОПО сценариях возможных техногенных событий на опасных производственных объектах в период с '.' '.$start.' '.'по'.' '. $finish;
        $data['rows'] = Jas::orderby('id')->where('data', '<', $finish)->where('data', '>', $start)->get();
        $patch = 'scena ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_scena', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_result_pk($start, $finish)
    {
        $data['title'] = 'Сведения о результатах проверок, проводимых при осуществлении производственного контроля, устранении нарушений в период с '.' '.$start.' '.'по'.' '. $finish;
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<', $finish)->where('date_check_out', '>', $start)->get();
        $patch = 'result_pk ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_result_pk', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_violations_report($start, $finish)
    {
        $data['title'] = 'Отчет о выяленных нарушениях на опасных производственных объектах в период с '.' '.$start.' '.'по'.' '. $finish;
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<', $finish)->where('date_check_out', '>', $start)->get();
        $patch = 'violations_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_violations_report', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

     public function pdf_repair($start, $finish)
    {
        $data['title'] = 'Отчет "Анализ повторяемости несоответствий" в период с '.' '.$start.' '.'по'.' '. $finish;
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<', $finish)->where('date_check_out', '>', $start)->get();
        $patch = 'repair_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_repair', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_event($start, $finish)
    {
        $data['title'] = 'Отчет о проведенных контрольных мероприятиях и выявленных нарушениях в период с '.' '.$start.' '.'по'.' '. $finish;
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<', $finish)->where('date_check_out', '>', $start)->get();
        $patch = 'event_report ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_event', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_effect($start, $finish)
    {
        $data['title'] = 'Отчет об эффективности производственного контроля в период с '.' '.$start.' '.'по'.' '. $finish;
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<', $finish)->where('date_check_out', '>', $start)->get();
        $patch = 'effect_pk ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_effect', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_info_act($start, $finish)
    {
        $data['title'] = 'Справка о выполнении актов в период с '.' '.$start.' '.'по'.' '. $finish;
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<', $finish)->where('date_check_out', '>', $start)->get();
        $patch = 'info_act ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_info_act', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_act_pb($start, $finish)
    {
        $data['title'] = 'Отчет о состоянии элементов опасных производственных объектов в период с '.' '.$start.' '.'по'.' '. $finish;
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<', $finish)->where('date_check_out', '>', $start)->get();
        $patch = 'status_elem' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_act_pb', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }

    public function pdf_quality_criteria($start, $finish)
    {
        $data['title'] = 'Справка о выполнении актов ПБ в период с '.' '.$start.' '.'по'.' '. $finish;
        $data['rows'] = Data_check_out::orderby('id')->where('date_check_out', '<', $finish)->where('date_check_out', '>', $start)->get();
        $patch = 'quality_criteria ' . Carbon::now() . '.pdf';
        $pdf = PDF::loadView('web.docs.reports.pdf.pdf_quality_criteria', compact('data'))->setPaper('a4', 'landscape');
        return $pdf->download($patch);

    }
}
