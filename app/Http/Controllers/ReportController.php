<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Form52Controller;
use App\Models\APK_SDK;
use App\Models\APK_SDK_OF;
use App\Models\Reports\Form52;
use App\Models\Reports\Form52_table;
use App\Models\Reports\Form5363;
use App\Models\Reports\Form5363_table;
use App\Models\Rtn2\Act_reason_accident;
use App\Models\Rtn2\General_info;
use App\Models\Rtn2\Info_accident_investigation;
use App\Models\Rtn2\Info_building;
use App\Models\Rtn2\Info_insurance;
use App\Models\Rtn2\Info_manage_system;
use App\Models\Rtn2\Info_pk;
use App\Models\Rtn2\Info_plan;
use App\Models\Rtn2\Info_respons_worker;
use App\Models\Rtn2\Info_tu;
use App\Models\Rtn2\Kol_vo_checking;
use App\Models\Rtn2\Mark_ready;
use App\Models\Rtn2\Name_work;
use App\Models\Rtn2\Offers;
use App\Models\Rtn2\Organisation;
use App\Models\Rtn2\Plan_event;
use App\Models\Rtn2\Planing;
use App\Models\Rtn2\Pmla;
use App\Models\Rtn2\Realization;
use App\Models\Rtn2\Signed_data;
use App\Models\Rtn2\Status_tu;
use App\Models\XML_journal;
use Illuminate\Http\Request;
use App\Models\Calc_elem;
use App\Models\Calc_ip_opo_i;
use App\Models\Rtn\Data_check_out;
use App\Models\Rtn\Data_result_check;
use App\Ref_opo;
use Carbon\Carbon;
use App\Models\Ref_obj;
use App\Jas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;

class ReportController extends Controller
{

    //===============================================
    //$request->date  ========дата из браузера=======
    //===============================================
    public function xml_journal(Request $request)
    {
        $start = DateTime::createFromFormat('d.m.Y', $request->start_date)->format('Y-m-d');
        $finish = DateTime::createFromFormat('d.m.Y', $request->finish_date)->format('Y-m-d');
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
        return view('web.docs.reports.xml_journal', compact('data', 'start', 'finish'));
    }
    public function xml_journal_delete()
    {
        XML_journal::truncate();

        AdminController::log_record('Очистил журнал отправки XML');

        return redirect('docs/rtn');
    }

    public function report(Request $request)
    {
        $start = date("Y-m-d", strtotime($request->start_date));
        $finish = date("Y-m-d H:i", strtotime($request->finish_date.'+ 23 hour 59 minutes'));
        $date = date('Y-m-d');
        $i=0;
        $j = 0;
        $desc_opo[$i] = "";
        $name_obj[$i] = "";
        $ip_elem[$i] = "";
        $op_m[$i] = "";
        $op_el[$i] = "";
        $op_r[$i] = "";
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
        return view('web.docs.reports.form_8', compact('data', 'start', 'finish'));
    }

    public function report1(Request $request)
    {
        $start = $request->start_date;
        $finish = date("Y-m-d H:i", strtotime($request->finish_date.'+ 23 hour 59 minutes'));
        $finish_fact = $request->finish_date;
        return view('web.docs.reports.scena_report', compact('start', 'finish', 'finish_fact'), ['rows1'=>Jas::orderby('id')->where('data', '<', $finish)
            ->where('data', '>', $start)->get()]);
    }

    public function report2(Request $request)
    {
        $start = $request->start_date;
        $finish = date("Y-m-d H:i", strtotime($request->finish_date.'+ 23 hour 59 minutes'));
        $finish_fact = $request->finish_date;
        return view('web.docs.reports.result_pk', compact('start', 'finish', 'finish_fact'), ['rows2'=>Data_check_out::orderby('id')->where('date_check_out', '<', $finish)
            ->where('date_check_out', '>', $start)->get()]);
    }

    public function report3(Request $request)
    {
        $start = date("Y-m-d", strtotime($request->start_date));
        $finish = date("Y-m-d H:i", strtotime($request->finish_date.'+ 23 hour 59 minutes'));
        $finish_fact = $request->finish_date;
        $data_all = APK_SDK::orderby('id_apk')->where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
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
//        dd($data);
        return view('web.docs.reports.violations_report', compact('start', 'finish', 'data', 'finish_fact'));
    }

    public function report4(Request $request)
    {

        $start = date("Y-m-d", strtotime($request->start_date));
        $finish = date("Y-m-d H", strtotime($request->finish_date.'+ 24 hour'));

        foreach (Ref_opo::orderby('idOPO')->get() as $rows1) {
            $name_opos = $rows1->descOPO;

            $ip_opos = $rows1->opo_to_calc_period_min->where('date', '>=', $start)->where('date', '<=', $finish)->first()->ip_opo;

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
                'name_elem'=> $name,
                'ip'=>$ip ];

        }
        $finish_fact = date("Y-m-d", strtotime($request->finish_date));

        return view('web.docs.reports.status_opo', compact('data', 'start', 'finish', 'finish_fact'), ['data' => $data]);
    }

    public function child_form52_table (Request $request, $id_event)
    {
        return view('form52.create_table',['id'=>$id_event]);

    }
    public function store_child_form52 (Request $request)
    {

        Form52_table::create($request->all());
        $data = Form52::find($request->input('id_act'));
        return redirect()->action([Form52Controller::class, 'edit'], ['form52' => $data->id]);
    }

    public function edit_table($id_event)
    {
        $data = Form52_table::find($id_event);
        return view('form52.edit_table',compact('data'), ['rows'=>Form52_table::orderby('num')->where('id_event', '=', $id_event)->get()]);
    }

    public function update_table(Request $request, $id_event)
    {

        if ($_POST['save'] == 'Update_table') {
            $data = Form52_table::find($id_event);
            $id_act = $data->id_act;

            $input = $request->all();
            $data = Form52_table::find($id_event);
            $data->update($input);
            return redirect()->route('form52.edit', $id_act)
                ->with('success', 'User updated successfully');
        }
    }

    public function destroy_row_tab_52($id_event)
    {
        $data = Form52_table::find($id_event);
        $id_act = $data->id_act;
        Form52_table::find($id_event)->delete();
        return redirect()->action([Form52Controller::class, 'edit'], ['form52' => $id_act]);
    }

    public function edit_table5363($id_event)
    {
        $data = Form5363_table::find($id_event);
        return view('form5363.edit_table',compact('data'), ['rows'=>Form5363_table::orderby('num_event')->where('id_event', '=', $id_event)->get()]);
    }

    public function update_table5363(Request $request, $id_event)
    {

        if ($_POST['save'] == 'Update_table') {
            $data = Form5363_table::find($id_event);
            $id_act = $data->id_act;

            $input = $request->all();
            $data = Form5363_table::find($id_event);
            $data->update($input);
            return redirect()->route('form5363.edit', $id_act)
                ->with('success', 'User updated successfully');
        }
    }

    public function destroy_row_tab_5363($id_event)
    {
        $data = Form5363_table::find($id_event);
        $id_act = $data->id_act;
        Form5363_table::find($id_event)->delete();
        return redirect()->route('form5363.edit', $id_act)
            ->with('success','User deleted successfully');
    }

    public function child_form5363_table (Request $request, $id_event)
    {
        return view('form5363.create_table',['id'=>$id_event]);

    }
    public function store_child_form5363 (Request $request)
    {

        Form5363_table::create($request->all());
        $data = Form5363::find($request->input('id_act'));
        return redirect()->action([Form5363Controller::class, 'edit'], ['form5363' => $data->id]);
    }

    public function report5(Request $request)
    {
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
        $start = $request->start_date;
        $finish = date("Y-m-d H:i", strtotime($request->finish_date.'+ 23 hour 59 minutes'));
        $finish_fact = $request->finish_date;
        $all_violation = count(APK_SDK::where('daterec', '>', date("Y-m-d", strtotime($start.'- 1 year')))->where('daterec', '<', date("Y-m-d", strtotime($finish)))->where('infi_repeat', '!=', '0')->get());
        $data_all = APK_SDK::orderByDesc('id_apk')->where('infi_repeat', '!=', '0')->where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
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
        return view('web.docs.reports.repiat_report', compact('start', 'finish', 'finish_fact', 'output_data', 'all_violation'));
    }

    public function report6(Request $request)
    {
        $start = $request->start_date;
        $finish = date("Y-m-d H:i", strtotime($request->finish_date.'+ 23 hour 59 minutes'));
        $finish_fact = $request->finish_date;
        $data_opo = Ref_opo::orderby('idOPO')->get();
        $data_SDK_APK = APK_SDK::orderby('idOPO')->where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
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
        return view('web.docs.reports.event_pk', compact('start', 'finish', 'finish_fact', 'data'));
    }

    public function report_info_act(Request $request)
    {
        $start = $request->start_date;
        $finish = date("Y-m-d H:i", strtotime($request->finish_date.'+ 23 hour 59 minutes'));
        $finish_fact = $request->finish_date;
        return view('web.docs.reports.info_act', compact('start', 'finish', 'finish_fact'), ['rows'=>Data_check_out::orderby('id')->where('date_check_out', '<', $finish)
            ->where('date_check_out', '>', $start)->get()]);
    }

    public function report_act_pb(Request $request)
    {
        $start = $request->start_date;
        $finish = date("Y-m-d H:i", strtotime($request->finish_date.'+ 23 hour 59 minutes'));
        $finish_fact = $request->finish_date;
        return view('web.docs.reports.act_pb', compact('start', 'finish', 'finish_fact'), ['rows'=>Data_check_out::orderby('id')->where('date_check_out', '<', $finish)
            ->where('date_check_out', '>', $start)->get()]);
    }

    public function report_quality_criteria(Request $request)
    {
        $start = $request->start_date;
        $finish = date("Y-m-d H:i", strtotime($request->finish_date.'+ 23 hour 59 minutes'));
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
        return view('web.docs.reports.quality_criteria', compact('start', 'finish', 'data', 'sum'));
    }

    public function Showrtn2()
    {
        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        $table11 = Info_insurance::orderBy('id')->get();
        $table21 = Organisation::orderBy('id')->get();
        $table22 = Realization::orderBy('id')->get();
        $table23 = Info_pk::orderBy('id')->get();
        $table3 = Info_manage_system::orderBy('id')->get();
        $table4 = Info_plan::orderBy('id')->get();
        $table51 = Kol_vo_checking::orderBy('id')->get();
        $table521 = Name_work::orderBy('id')->get();
        $table53 = Offers::orderBy('id')->get();
        $table61 = General_info::orderBy('id')->get();
        $table62 = Info_building::orderBy('id')->get();
        $table63 = Info_tu::orderBy('id')->get();
        $table64 = Status_tu::orderBy('id')->get();
        $table71 = Info_accident_investigation::orderBy('id')->get();
        $table72 = Act_reason_accident::orderBy('id')->get();
        $table81 = Info_respons_worker::orderBy('id')->get();
        $table82 = Pmla::orderBy('id')->get();
        $table83 = Planing::orderBy('id')->get();
        $table84 = Mark_ready::orderBy('id')->get();
        $table91 = Plan_event::orderBy('id')->get();
        $table10 = Signed_data::orderBy('id')->get();
        return view('web.docs.rtn2.index', compact('jas', 'table11', 'table21', 'table22', 'table23', 'table3', 'table4', 'table51', 'table521', 'table53', 'table61', 'table62', 'table63', 'table64', 'table71', 'table72', 'table81', 'table82', 'table83', 'table84', 'table91', 'table10'));

    }
//************************ Работа с таблицами годового отчета   ******************
//************************ tab11   ******************
    // Удалить строку
    public function delete_row_tab11($id)
    {
        DB::delete('delete from rtn2.info_insurance where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab11($id)
    {
        $data_table = Info_insurance::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab11',compact('data_table', 'id'));
    }
    public function update_tab11(Request $request)
    {
     $input = $request->all();
        $id = $request->input('id');
        $data_table = Info_insurance::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab11()
    {
        return view('web.docs.rtn2.edit_table.new_tab11', ['table_data' => Info_insurance::all()]);
    }
    public function save_tab11(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'num_polis' => 'required',
            'time' => 'required'
        ]);
        $input = $request->all();
        $table = Info_insurance::create($input);
        return redirect('/docs/rtn2');
    }
//************************ tab21   ******************
    // Удалить строку
    public function delete_row_tab21($id)
    {
        DB::delete('delete from rtn2.organisation where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab21($id)
    {
        $data_table = Organisation::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab21',compact('data_table', 'id'));
    }
    public function update_tab21(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Organisation::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab21()
    {
        return view('web.docs.rtn2.edit_table.new_tab21', ['table_data' => Organisation::all()]);
    }
    public function save_tab21(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'name_f' => 'required',
            'name_n' => 'required',
            'name_o' => 'required',
            'post' => 'required',
            'education' => 'required',
            'experiens' => 'required'
        ]);
        $input = $request->all();
        $table = Organisation::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab22   ******************
    // Удалить строку
    public function delete_row_tab22($id)
    {
        DB::delete('delete from rtn2.realization where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab22($id)
    {
        $data_table = Realization::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab22',compact('data_table', 'id'));
    }
    public function update_tab22(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Realization::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab22()
    {
        return view('web.docs.rtn2.edit_table.new_tab22', ['table_data' => Realization::all()]);
    }
    public function save_tab22(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'name_f' => 'required',
            'name_n' => 'required',
//            'name_o' => 'required',
            'post' => 'required',
            'education' => 'required',
            'experiens' => 'required',
//            'last_sert' => 'required'
        ]);
        $input = $request->all();
        $table = Realization::create($input);
        return redirect('/docs/rtn2');
    }
//************************ tab23   ******************
    // Удалить строку
    public function delete_row_tab23($id)
    {
        DB::delete('delete from rtn2.info_pk where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab23($id)
    {
        $data_table = Info_pk::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab23',compact('data_table', 'id'));
    }
    public function update_tab23(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Info_pk::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab23()
    {
        return view('web.docs.rtn2.edit_table.new_tab23', ['table_data' => Info_pk::all()]);
    }
    public function save_tab23(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'date' => 'required',
            'doc' => 'required'
        ]);
        $input = $request->all();
        $table = Info_pk::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab3   ******************
    // Удалить строку
    public function delete_row_tab3($id)
    {
        DB::delete('delete from rtn2.info_manage_system where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab3($id)
    {
        $data_table = Info_manage_system::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab3',compact('data_table', 'id'));
    }
    public function update_tab3(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Info_manage_system::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab3()
    {
        return view('web.docs.rtn2.edit_table.new_tab3', ['table_data' => Info_manage_system::all()]);
    }
    public function save_tab3(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'date_act' => 'required',
            'date_plan_from' => 'required',
            'period_event' => 'required',
            'analitic' => 'required'
        ]);
        $input = $request->all();
        $table = Info_manage_system::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab4   ******************
    // Удалить строку
    public function delete_row_tab4($id)
    {
        DB::delete('delete from rtn2.info_plan where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab4($id)
    {
        $data_table = Info_plan::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab4',compact('data_table', 'id'));
    }
    public function update_tab4(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Info_plan::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab4()
    {
        return view('web.docs.rtn2.edit_table.new_tab4', ['table_data' => Info_plan::all()]);
    }
    public function save_tab4(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'name_event' => 'required',
//            'date_accept' => 'required',
//            'check_event' => 'required',
//            'file' => 'required',
//            'reason_nonpref' => 'required',
//            'recvisits_1' => 'required',
//            'recvisits_2' => 'required',
            'check_require' => 'required',
//            'doc' => 'required',
//            'reason_nonpref_require' => 'required'
        ]);
        $input = $request->all();
        $table = Info_plan::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab51   ******************
    // Удалить строку
    public function delete_row_tab51($id)
    {
        DB::delete('delete from rtn2.kol_vo_checking where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab51($id)
    {
        $data_table = Kol_vo_checking::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab51',compact('data_table', 'id'));
    }
    public function update_tab51(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Kol_vo_checking::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab51()
    {
        return view('web.docs.rtn2.edit_table.new_tab51', ['table_data' => Kol_vo_checking::all()]);
    }
    public function save_tab51(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'kol_vo_breach' => 'required',
            'kol_vo_breach_nonpref' => 'required',
            'kol_vo_attraction' => 'required'
        ]);
        $input = $request->all();
        $table = Kol_vo_checking::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab521   ******************
    // Удалить строку
    public function delete_row_tab521($id)
    {
        DB::delete('delete from rtn2.name_work where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab521($id)
    {
        $data_table = Name_work::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab521',compact('data_table', 'id'));
    }
    public function update_tab521(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Name_work::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab521()
    {
        return view('web.docs.rtn2.edit_table.new_tab521', ['table_data' => Name_work::all()]);
    }
    public function save_tab521(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'name_job' => 'required',
            'num_tu' => 'required',
//            'reason_stop' => 'required',
//            'time_stop' => 'required',
//            'check_event' => 'required',
//            'date_act' => 'required',
//            'num_act' => 'required'
        ]);
        $input = $request->all();
        $table = Name_work::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab53   ******************
    // Удалить строку
    public function delete_row_tab53($id)
    {
        DB::delete('delete from rtn2.offers where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab53($id)
    {
        $data_table = Offers::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab53',compact('data_table', 'id'));
    }
    public function update_tab53(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Offers::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab53()
    {
        return view('web.docs.rtn2.edit_table.new_tab53', ['table_data' => Offers::all()]);
    }
    public function save_tab53(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'offer_list' => 'required',
            'event' => 'required'
        ]);
        $input = $request->all();
        $table = Offers::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab61   ******************
    // Удалить строку
    public function delete_row_tab61($id)
    {
        DB::delete('delete from rtn2.general_info where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab61($id)
    {
        $data_table = General_info::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab61',compact('data_table', 'id'));
    }
    public function update_tab61(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = General_info::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab61()
    {
        return view('web.docs.rtn2.edit_table.new_tab61', ['table_data' => General_info::all()]);
    }
    public function save_tab61(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'kol_vo_building' => 'required',
            'kol_vo_build' => 'required',
            'kol_vo_operated_obj' => 'required',
            'kol_vo_nonoperated_obj' => 'required'
        ]);
        $input = $request->all();
        $table = General_info::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab62   ******************
    // Удалить строку
    public function delete_row_tab62($id)
    {
        DB::delete('delete from rtn2.info_building where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab62($id)
    {
        $data_table = Info_building::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab62',compact('data_table', 'id'));
    }
    public function update_tab62(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Info_building::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab62()
    {
        return view('web.docs.rtn2.edit_table.new_tab62', ['table_data' => Info_building::all()]);
    }
    public function save_tab62(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'name' => 'required',
            'year_exp' => 'required',
//            'date_reconstruction' => 'required',
//            'date_repair' => 'required',
//            'date_next_check' => 'required',
//            'date_check' => 'required',
            'result_check' => 'required',
//            'percent_event' => 'required',
//            'file' => 'required'
        ]);
        $input = $request->all();
        $table = Info_building::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab63   ******************
    // Удалить строку
    public function delete_row_tab63($id)
    {
        DB::delete('delete from rtn2.info_tu where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab63($id)
    {
        $data_table = Info_tu::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab63',compact('data_table', 'id'));
    }
    public function update_tab63(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Info_tu::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab63()
    {
        return view('web.docs.rtn2.edit_table.new_tab63', ['table_data' => Info_tu::all()]);
    }
    public function save_tab63(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'kol_vo_tu' => 'required',
            'kol_vo_old_tu' => 'required',
            'file_tu_out' => 'required',
            'kol_vo_repair_tu' => 'required'
//            'file_tu_repair' => 'required'
        ]);
        $input = $request->all();
        $table = Info_tu::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab64   ******************
    // Удалить строку
    public function delete_row_tab64($id)
    {
        DB::delete('delete from rtn2.status_tu where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab64($id)
    {
        $data_table = Status_tu::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab64',compact('data_table', 'id'));
    }
    public function update_tab64(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Status_tu::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab64()
    {
        return view('web.docs.rtn2.edit_table.new_tab64', ['table_data' => Status_tu::all()]);
    }
    public function save_tab64(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'num_tu' => 'required',
            'name_tu' => 'required',
//            'serial_num' => 'required',
//            'industrial_num' => 'required',
//            'invent_num' => 'required',
//            'type_auto' => 'required',
//            'type' => 'required',
//            'vid_auto' => 'required',
//            'vid' => 'required',
//            'mark' => 'required',
            'country' => 'required',
            'time_exp' => 'required',
            'year_exp' => 'required',
            'old_percent' => 'required',
//            'repair_info' => 'required',
//            'num_doc' => 'required',
            'doc_check' => 'required',
//            'date_check' => 'required',
            'result_check' => 'required',
//            'info_event_check' => 'required',
            'accept_time' => 'required',
            'accept_kol_vo' => 'required',
            'fact_time' => 'required',
            'fact_kol_vo' => 'required',
            'check_control' => 'required',
//            'info_demo_tu' => 'required',
//            'time_demo' => 'required',
//            'info_devices' => 'required',
//            'info_event' => 'required',
            'tu_repair_check' => 'required'
//            'num_new_tu' => 'required'
        ]);
        $input = $request->all();
        $table = Status_tu::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab71   ******************
    // Удалить строку
    public function delete_row_tab71($id)
    {
        DB::delete('delete from rtn2.info_accident_investigation where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab71($id)
    {
        $data_table = Info_accident_investigation::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab71',compact('data_table', 'id'));
    }
    public function update_tab71(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Info_accident_investigation::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab71()
    {
        return view('web.docs.rtn2.edit_table.new_tab71', ['table_data' => Info_accident_investigation::all()]);
    }
    public function save_tab71(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'type_accident' => 'required',
            'desc_accident' => 'required',
            'place' => 'required',
            'date_accident' => 'required',
            'respons_worker' => 'required',
            'check_event' => 'required',
            'event' => 'required'
        ]);
        $input = $request->all();
        $table = Info_accident_investigation::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab72   ******************
    // Удалить строку
    public function delete_row_tab72($id)
    {
        DB::delete('delete from rtn2.act_reason_accident where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab72($id)
    {
        $data_table = Act_reason_accident::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab72',compact('data_table', 'id'));
    }
    public function update_tab72(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Act_reason_accident::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab72()
    {
        return view('web.docs.rtn2.edit_table.new_tab72', ['table_data' => Act_reason_accident::all()]);
    }
    public function save_tab72(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'date_accept' => 'required',
            'info_wort_to_accept' => 'required',
            'fam_wort_to_accept' => 'required',
            'name_wort_to_accept' => 'required'
//            'otch_wort_to_accept' => 'required'
        ]);
        $input = $request->all();
        $table = Act_reason_accident::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab81   ******************
    // Удалить строку
    public function delete_row_tab81($id)
    {
        DB::delete('delete from rtn2.info_respons_worker where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab81($id)
    {
        $data_table = Info_respons_worker::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab81',compact('data_table', 'id'));
    }
    public function update_tab81(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Info_respons_worker::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab81()
    {
        return view('web.docs.rtn2.edit_table.new_tab81', ['table_data' => Info_respons_worker::all()]);
    }
    public function save_tab81(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'fam' => 'required',
            'name' => 'required',
//            'otch' => 'required',
            'education' => 'required',
            'experiens' => 'required',
            'check_resurs' => 'required',
            'check_system_monitoring' => 'required'
        ]);
        $input = $request->all();
        $table = Info_respons_worker::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab82   ******************
    // Удалить строку
    public function delete_row_tab82($id)
    {
        DB::delete('delete from rtn2.pmla where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab82($id)
    {
        $data_table = Pmla::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab82',compact('data_table', 'id'));
    }
    public function update_tab82(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Pmla::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab82()
    {
        return view('web.docs.rtn2.edit_table.new_tab82', ['table_data' => Pmla::all()]);
    }
    public function save_tab82(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'date_accept' => 'required',
            'time' => 'required',
            'name_service' => 'required',
            'time_evidence' => 'required',
            'info_other_service' => 'required',
            'pmla_copy' => 'required'
        ]);
        $input = $request->all();
        $table = Pmla::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab83   ******************
    // Удалить строку
    public function delete_row_tab83($id)
    {
        DB::delete('delete from rtn2.planing where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab83($id)
    {
        $data_table = Planing::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab83',compact('data_table', 'id'));
    }
    public function update_tab83(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Planing::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab83()
    {
        return view('web.docs.rtn2.edit_table.new_tab83', ['table_data' => Planing::all()]);
    }
    public function save_tab83(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'info_event' => 'required',
            'file_info' => 'required',
            'check_agreement' => 'required'
//            'date_agreement' => 'required',
//            'nym_agreement' => 'required',
//            'date_end_agreement' => 'required',
//            'isp_agreement' => 'required'
        ]);
        $input = $request->all();
        $table = Planing::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab84   ******************
    // Удалить строку
    public function delete_row_tab84($id)
    {
        DB::delete('delete from rtn2.mark_ready where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab84($id)
    {
        $data_table = Mark_ready::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab84',compact('data_table', 'id'));
    }
    public function update_tab84(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Mark_ready::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab84()
    {
        return view('web.docs.rtn2.edit_table.new_tab84', ['table_data' => Mark_ready::all()]);
    }
    public function save_tab84(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'kol_vo_worker' => 'required',
            'result_ready' => 'required',
            'comment' => 'required'
        ]);
        $input = $request->all();
        $table = Mark_ready::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab91   ******************
    // Удалить строку
    public function delete_row_tab91($id)
    {
        DB::delete('delete from rtn2.plan_event where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab91($id)
    {
        $data_table = Plan_event::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab91',compact('data_table', 'id'));
    }
    public function update_tab91(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Plan_event::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab91()
    {
        return view('web.docs.rtn2.edit_table.new_tab91', ['table_data' => Plan_event::all()]);
    }
    public function save_tab91(Request $request)
    {
        $this->validate($request, [
            'num_opo' => 'required',
            'name_event' => 'required',
            'time' => 'required'
        ]);
        $input = $request->all();
        $table = Plan_event::create($input);
        return redirect('/docs/rtn2');
    }
    //************************ tab10   ******************
    // Удалить строку
    public function delete_row_tab10($id)
    {
        DB::delete('delete from rtn2.signed_data where id = ?', [$id]);
        return redirect('/docs/rtn2');
    }
    public function edit_tab10($id)
    {
        $data_table = Signed_data::find($id);
        return view('web.docs.rtn2.edit_table.edit_tab10',compact('data_table', 'id'));
    }
    public function update_tab10(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id');
        $data_table = Signed_data::find($id);
        $data_table->update($input);
        return redirect('/docs/rtn2');
    }
    public function new_tab10()
    {
        return view('web.docs.rtn2.edit_table.new_tab10', ['table_data' => Signed_data::all()]);
    }
    public function save_tab10(Request $request)
    {
        $this->validate($request, [
            'fam' => 'required',
            'name' => 'required',
//            'otch' => 'required',
            'position' => 'required'
//            'sign' => 'required'
        ]);
        $input = $request->all();
        $table = Signed_data::create($input);
        return redirect('/docs/rtn2');
    }
}
