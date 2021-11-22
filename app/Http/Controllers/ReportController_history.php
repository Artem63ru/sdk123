<?php

namespace App\Http\Controllers;

use App\Jas;
use App\Models\APK_SDK;
use App\Models\Operational_safety;
use App\Models\Ref_obj;
use App\Models\Ref_oto;
use App\Models\Report_history\ElementStatus_day;
use App\Models\Report_history\EventPk;
use App\Models\Report_history\QualityCriteria;
use App\Models\Report_history\RepiatReport;
use App\Models\Report_history\ResultPk;
use App\Models\Report_history\ScenaReport;
use App\Models\Report_history\StatusOpo;
use App\Models\Report_history\ViolationsReport;
use App\Models\Rtn\Data_check_out;
use App\Models\XML_journal;
use App\Ref_opo;
use Illuminate\Support\Facades\Storage;
use XmlResponse\Facades\XmlFacade;


class ReportController_history extends Controller
{

    public function test_ober()   //список отчетов по дням
    {
        $data_oto = Ref_oto::all();
        foreach ($data as $row){
            $title_oto = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
            $row->update(['guid' => $title_oto]);
        }
        $data_opo = Ref_opo::all();
        foreach ($data_opo as $row){
            $title_opo = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
            $row->update(['guid' => $title_opo]);
        }
        $data_obj = Ref_obj::all();
        foreach ($data_obj as $row){
            $title_obj = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
            $row->update(['guid' => $title_obj]);
        }
        $data_xml = XML_journal::all();
        foreach ($data_xml as $row){
            $title_xml = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
            $row->update(['guid' => $title_xml]);
        }
    }

    ///////////////Отчет о состоянии элементов ОПО///////////////
    public function element_status_day_data()   //загрузка данных в общую таблицу
    {
        $start = today();
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        $input = Ref_obj::where('InUse','=','1')->where('status', '=', '50')->orderby('idObj')->get();
        foreach ($input as $row){
            $data['name_opo'] = $row->obj_to_opo->descOPO;
            $data['name_obj'] = $row->nameObj;
            foreach ($row->elem_to_calc_report as $rows){
                if($rows->date <= $finish && $rows->date >= $start){
                    $data['IP_obj'] = $rows->ip_elem;
                    $data['OP_pb'] = $rows->op_m;
                    $data['OP_tech_risk'] = $rows->op_el;
                    $data['OP_reg'] = $rows->op_r;
                    $data['date'] = $start;
                }
            }
            $data['type'] = 'day';
            $writing = ElementStatus_day::create($data);
        }
//        сделать запрос в базу и вытащить все, что надо передать в xml
        $to_xml = ElementStatus_day::where('type', '=', 'day')->where('date', $start)->get();
        Storage::disk('local')->put('ElementStatus_day.xml', XmlFacade::asXml($to_xml), 'public');
    }

    public function element_status_day()   //список отчетов по дням
    {
        $title['main'] = "Отчеты о состоянии элементов опасных производственных объектов за день";
        $title['period']="За день";
        $title['adress'] = "status_elem_day";
        $data = ElementStatus_day::select('date', 'type')->where('type', '=', 'day')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function element_status_day_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'day';
        $data = ElementStatus_day::where('date', '=', $date)->where('type', '=', 'day')->get();
        $start = $date;
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.status_elem', compact('data', 'start', 'finish', 'title'));
    }

    public function element_status_month_data()   //загрузка данных в общую таблицу
    {
        $start = date('Y-m-01', strtotime(today().'- 1 month'));
        $finish = date("Y-m-t", strtotime($start));
        $input = Ref_obj::where('InUse','=','1')->where('status', '=', '50')->orderby('idObj')->get();
        foreach ($input as $row){
            $data['name_opo'] = $row->obj_to_opo->descOPO;
            $data['name_obj'] = $row->nameObj;
            foreach ($row->elem_to_calc_report as $rows){
                if($rows->date <= $finish && $rows->date >= $start){
                    $data['IP_obj'] = $rows->ip_elem;
                    $data['OP_pb'] = $rows->op_m;
                    $data['OP_tech_risk'] = $rows->op_el;
                    $data['OP_reg'] = $rows->op_r;
                    $data['date'] = $start;
                }
            }
            $data['type'] = 'month';
            $writing = ElementStatus_day::create($data);
        }
    }

    public function element_status_month()   //список отчетов по месяцам
    {
        $title['main'] = "Отчеты о состоянии элементов опасных производственных объектов за месяц";
        $title['period']="За месяц";
        $title['adress'] = "status_elem_day";
        $data = ElementStatus_day::select('date', 'type')->where('type', '=', 'month')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();;
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function element_status_month_show($date)   //содержимое отчета за конкретный месяц
    {
        $title = 'month';
        $data = ElementStatus_day::where('date', '=', $date)->where('type', '=', 'month')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        $finish_day = date("Y-".$month."-t", strtotime($start));
        $finish = date("Y-m-d H:i", strtotime($finish_day.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.status_elem', compact('data', 'start', 'finish', 'title'));
    }

    public function element_status_quarter_data()   //загрузка данных в общую таблицу
    {
        $current_month = date('m', strtotime(today().'- 1 month'));
        if($current_month>=1 && $current_month<=3)
        {
            $start = date('Y-01-01');
            $finish = date('Y-03-t');
        }
        else  if($current_month>=4 && $current_month<=6)
        {
            $start = date('Y-04-01');
            $finish = date('Y-06-t');
        }
        else  if($current_month>=7 && $current_month<=9)
        {
            $start = date('Y-07-01');
            $finish = date('Y-09-t');
        }
        else  if($current_month>=10 && $current_month<=12)
        {
            $start = date('Y-10-01');
            $finish = date('Y-12-t');
        }
        $input = Ref_obj::where('InUse','=','1')->where('status', '=', '50')->orderby('idObj')->get();
        foreach ($input as $row){
            $data['name_opo'] = $row->obj_to_opo->descOPO;
            $data['name_obj'] = $row->nameObj;
            foreach ($row->elem_to_calc_report as $rows){
                if($rows->date <= $finish && $rows->date >= $start){
                    $data['IP_obj'] = $rows->ip_elem;
                    $data['OP_pb'] = $rows->op_m;
                    $data['OP_tech_risk'] = $rows->op_el;
                    $data['OP_reg'] = $rows->op_r;
                    $data['date'] = $start;
                }
            }
            $data['type'] = 'quarter';
            $writing = ElementStatus_day::create($data);
        }
    }

    public function element_status_quarter()   //список отчетов по месяцам
    {
        $title['main'] = "Отчеты о состоянии элементов опасных производственных объектов за квартал";
        $title['period']="За ";
        $title['adress'] = "status_elem_day";
        $data = ElementStatus_day::select('date', 'type')->where('type', '=', 'quarter')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();;
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function element_status_quarter_show($date)   //содержимое отчета за конкретный месяц
    {
        $title = 'quarter';
        $data = ElementStatus_day::where('date', '=', $date)->where('type', '=', 'quarter')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        if($month=="01")
        {
            $fin_date = date('Y-03-01');
            $finish = date("Y-03-t", strtotime($fin_date));
        }
        if($month=="04")
        {
            $fin_date = date('Y-06-01');
            $finish = date("Y-06-t", strtotime($fin_date));
        }
        if($month=="07")
        {
            $fin_date = date('Y-09-01');
            $finish = date("Y-09-t", strtotime($fin_date));
        }
        if($month=="10")
        {
            $fin_date = date('Y-12-01');
            $finish = date("Y-12-t", strtotime($fin_date));
        }
        return view('web.docs.report_history.status_elem', compact('data', 'start', 'finish', 'title'));
    }

    /////////////////////отчет о зафиксированных событиях////////////////////////////
    public function report_scena_day_data()   //загрузка данных в общую таблицу
    {
        $start = today();
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        $input = Jas::orderby('id')->where('data', '<=', $finish)->where('data', '>=', $start)->get();
        foreach ($input as $row){
            $data['date_event'] = $row->data;
            $data['name_opo'] = $row->jas_to_opo->descOPO;
            $data['name_obj'] = $row->jas_to_elem->nameObj;
            $data['name_scena'] = $row->name;
            $data['class_event'] = $row->level;
            $data['status'] = $row->status;
            $data['type'] = 'day';
            $data['date'] = $start;
            $writing = ScenaReport::create($data);
        }
        //        сделать запрос в базу и вытащить все, что надо передать в xml
        $to_xml = ScenaReport::where('type', '=', 'day')->where('date', $start)->get();
        Storage::disk('local')->put('ScenaReport_day.xml', XmlFacade::asXml($to_xml), 'public');
    }

    public function scena_report_day()   //список отчетов по дням
    {
        $title['main'] = "Отчет о зафиксированных СДК ПБ ОПО сценариях возможных техногенных событий на опасных производственных объектах за день";
        $title['period']="За день";
        $title['adress'] = "scena_report";
        $data = ScenaReport::select('date', 'type')->where('type', '=', 'day')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();;
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function scena_report_day_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'day';
        $data = ScenaReport::where('date', '=', $date)->where('type', '=', 'day')->get();
        $start = $date;
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.scena_report', compact('data', 'start', 'finish', 'title'));
    }

    public function report_scena_month_data()   //загрузка данных в общую таблицу
    {
        $start = date('Y-m-01', strtotime(today().'- 1 month'));
        $finish = date("Y-m-t", strtotime($start));
        $input = Jas::orderby('id')->where('data', '<=', $finish)->where('data', '>=', $start)->get();
        foreach ($input as $row){
            $data['date_event'] = $row->data;
            $data['name_opo'] = $row->jas_to_opo->descOPO;
            $data['name_obj'] = $row->jas_to_elem->nameObj;
            $data['name_scena'] = $row->name;
            $data['class_event'] = $row->level;
            $data['status'] = $row->status;
            $data['type'] = 'month';
            $data['date'] = $start;
            $writing = ScenaReport::create($data);
        }
    }
    public function scena_report_month()   //список отчетов по дням
    {
        $title['main'] = "Отчет о зафиксированных СДК ПБ ОПО сценариях возможных техногенных событий на опасных производственных объектах за месяц";
        $title['period']="За месяц";
        $title['adress'] = "scena_report";
        $data = ScenaReport::select('date', 'type')->where('type', '=', 'month')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();;
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function scena_report_month_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'month';
        $data = ScenaReport::where('date', '=', $date)->where('type', '=', 'month')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        $finish_day = date("Y-".$month."-t", strtotime($start));
        $finish = date("Y-m-d H:i", strtotime($finish_day.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.scena_report', compact('data', 'start', 'finish', 'title'));
    }

    public function report_scena_quarter_data()   //загрузка данных в общую таблицу
    {
        $current_month = date('m', strtotime(today().'- 1 month'));
        if($current_month>=1 && $current_month<=3)
        {
            $start = date('Y-01-01');
            $finish = date('Y-03-t');
        }
        else  if($current_month>=4 && $current_month<=6)
        {
            $start = date('Y-04-01');
            $finish = date('Y-06-t');
        }
        else  if($current_month>=7 && $current_month<=9)
        {
            $start = date('Y-07-01');
            $finish = date('Y-09-t');
        }
        else  if($current_month>=10 && $current_month<=12)
        {
            $start = date('Y-10-01');
            $finish = date('Y-12-t');
        }
        $input = Jas::orderby('id')->where('data', '<=', $finish)->where('data', '>=', $start)->get();
        foreach ($input as $row){
            $data['date_event'] = $row->data;
            $data['name_opo'] = $row->jas_to_opo->descOPO;
            $data['name_obj'] = $row->jas_to_elem->nameObj;
            $data['name_scena'] = $row->name;
            $data['class_event'] = $row->level;
            $data['status'] = $row->status;
            $data['type'] = 'quarter';
            $data['date'] = $start;
            $writing = ScenaReport::create($data);
        }
    }
    public function scena_report_quarter()   //список отчетов по дням
    {
        $title['main'] = "Отчет о зафиксированных СДК ПБ ОПО сценариях возможных техногенных событий на опасных производственных объектах за квартал";
        $title['period']="За ";
        $title['adress'] = "scena_report";
        $data = ScenaReport::select('date', 'type')->where('type', '=', 'quarter')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();;
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function scena_report_quarter_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'quarter';
        $data = ScenaReport::where('date', '=', $date)->where('type', '=', 'quarter')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        if($month=="01")
        {
            $fin_date = date('Y-03-01');
            $finish = date("Y-03-t", strtotime($fin_date));
        }
        if($month=="04")
        {
            $fin_date = date('Y-06-01');
            $finish = date("Y-06-t", strtotime($fin_date));
        }
        if($month=="07")
        {
            $fin_date = date('Y-09-01');
            $finish = date("Y-09-t", strtotime($fin_date));
        }
        if($month=="10")
        {
            $fin_date = date('Y-12-01');
            $finish = date("Y-12-t", strtotime($fin_date));
        }
        return view('web.docs.report_history.scena_report', compact('data', 'start', 'finish', 'title'));
    }

    /////////////////////////отчет сведения о результатах проверок/////////////////////////
    public function result_pk_day_data()   //загрузка данных в общую таблицу
    {
        $start = today();
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        $input = Data_check_out::orderby('id')->where('date_check_out', '<=', $finish)->where('date_check_out', '>=', $start)->get();
        foreach ($input as $row){
            $data['date_check_out'] = $row->date_check_out;
            $data['norm_act'] = $row->norm_act;
            $data['point_act'] = $row->point_act;
            $data['char_violation'] = $row->char_violation;
            $data['name_event'] = $row->name_event;
            $data['time_violation'] = $row->time_violation;
            $data['date_violation'] = $row->date_violation;
            $data['name_f'] = $row->name_f;
            $data['name_l'] = $row->name_l;
            $data['name_p'] = $row->name_p;
            $data['reasons_nonpref'] = $row->reasons_nonpref;
            $data['data_reasons'] = $row->data_reasons;
            $data['reasons_post'] = $row->reasons_post;
            $data['worker_violation'] = $row->worker_violation;
            $data['date'] = $start;
            $data['type'] = 'day';
            $writing = ResultPk::create($data);
        }
        //        сделать запрос в базу и вытащить все, что надо передать в xml
        $to_xml = ResultPk::where('type', '=', 'day')->where('date', $start)->get();
        Storage::disk('local')->put('ResultPk_day.xml', XmlFacade::asXml($to_xml), 'public');
    }

    public function result_pk_day()   //список отчетов по дням
    {
        $title['main'] = "Сведения о результатах проверок, проводимых при осуществлении производственного контроля, устранении нарушений за день";
        $title['period']="За день";
        $title['adress'] = "result_pk";
        $data = ResultPk::select('date', 'type')->where('type', '=', 'day')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function result_pk_day_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'day';
        $data = ResultPk::where('date', '=', $date)->where('type', '=', 'day')->get();
        $start = $date;
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.result_pk', compact('data', 'start', 'finish', 'title'));
    }

    public function result_pk_month_data()   //загрузка данных в общую таблицу
    {
        $start = date('Y-m-01', strtotime(today().'- 1 month'));
        $finish = date("Y-m-t", strtotime($start));
        $input = Data_check_out::orderby('id')->where('date_check_out', '<=', $finish)->where('date_check_out', '>=', $start)->get();
        foreach ($input as $row){
            $data['date_check_out'] = $row->date_check_out;
            $data['norm_act'] = $row->norm_act;
            $data['point_act'] = $row->point_act;
            $data['char_violation'] = $row->char_violation;
            $data['name_event'] = $row->name_event;
            $data['time_violation'] = $row->time_violation;
            $data['date_violation'] = $row->date_violation;
            $data['name_f'] = $row->name_f;
            $data['name_l'] = $row->name_l;
            $data['name_p'] = $row->name_p;
            $data['reasons_nonpref'] = $row->reasons_nonpref;
            $data['data_reasons'] = $row->data_reasons;
            $data['reasons_post'] = $row->reasons_post;
            $data['worker_violation'] = $row->worker_violation;
            $data['date'] = $start;
            $data['type'] = 'month';
            $writing = ResultPk::create($data);
        }
    }

    public function result_pk_month()   //список отчетов по дням
    {
        $title['main'] = "Сведения о результатах проверок, проводимых при осуществлении производственного контроля, устранении нарушений за месяц";
        $title['period']="За месяц";
        $title['adress'] = "result_pk";
        $data = ResultPk::select('date', 'type')->where('type', '=', 'month')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function result_pk_month_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'month';
        $data = ResultPk::where('date', '=', $date)->where('type', '=', 'month')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        $finish_day = date("Y-".$month."-t", strtotime($start));
        $finish = date("Y-m-d H:i", strtotime($finish_day.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.result_pk', compact('data', 'start', 'finish', 'title'));
    }

    public function result_pk_quarter_data()   //загрузка данных в общую таблицу
    {
        $current_month = date('m', strtotime(today().'- 1 month'));
        if($current_month>=1 && $current_month<=3)
        {
            $start = date('Y-01-01');
            $finish = date('Y-03-t');
        }
        else  if($current_month>=4 && $current_month<=6)
        {
            $start = date('Y-04-01');
            $finish = date('Y-06-t');
        }
        else  if($current_month>=7 && $current_month<=9)
        {
            $start = date('Y-07-01');
            $finish = date('Y-09-t');
        }
        else  if($current_month>=10 && $current_month<=12)
        {
            $start = date('Y-10-01');
            $finish = date('Y-12-t');
        }
        $input = Data_check_out::orderby('id')->where('date_check_out', '<=', $finish)->where('date_check_out', '>=', $start)->get();
        foreach ($input as $row){
            $data['date_check_out'] = $row->date_check_out;
            $data['norm_act'] = $row->norm_act;
            $data['point_act'] = $row->point_act;
            $data['char_violation'] = $row->char_violation;
            $data['name_event'] = $row->name_event;
            $data['time_violation'] = $row->time_violation;
            $data['date_violation'] = $row->date_violation;
            $data['name_f'] = $row->name_f;
            $data['name_l'] = $row->name_l;
            $data['name_p'] = $row->name_p;
            $data['reasons_nonpref'] = $row->reasons_nonpref;
            $data['data_reasons'] = $row->data_reasons;
            $data['reasons_post'] = $row->reasons_post;
            $data['worker_violation'] = $row->worker_violation;
            $data['date'] = $start;
            $data['type'] = 'quarter';
            $writing = ResultPk::create($data);
        }
    }

    public function result_pk_quarter()   //список отчетов по дням
    {
        $title['main'] = "Сведения о результатах проверок, проводимых при осуществлении производственного контроля, устранении нарушений за квартал";
        $title['period']="За ";
        $title['adress'] = "result_pk";
        $data = ResultPk::select('date', 'type')->where('type', '=', 'quarter')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function result_pk_quarter_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'quarter';
        $data = ResultPk::where('date', '=', $date)->where('type', '=', 'quarter')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        if($month=="01")
        {
            $fin_date = date('Y-03-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-03-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="04")
        {
            $fin_date = date('Y-06-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-06-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="07")
        {
            $fin_date = date('Y-09-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-09-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="10")
        {
            $fin_date = date('Y-12-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-12-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        return view('web.docs.report_history.result_pk', compact('data', 'start', 'finish', 'title'));
    }

    /////////////////////////отчет о состоянии ОПО/////////////////////////
    public function status_opo_day_data()   //загрузка данных в общую таблицу
    {
        $start = today();
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        $input = Ref_opo::orderby('idOPO')->get();
        foreach ($input as $row){
            $name_opos = $row->descOPO;
            $ip_opos = $row->opo_to_calc_period_min->where('date', '>=', $start)->where('date', '<=', $finish)->first()->ip_opo;
            $ip = 1;
            foreach ($row->opo_to_obj as $item) {
                foreach ($item->elem_to_calc_report as $it){
                    if ($it->ip_elem <= $ip) {
                        $ip = $it->ip_elem;
                        $name = $item->nameObj;
                    }
                }
            }
            $data['name_opos'] = $name_opos;
            $data['ip_opos'] = $ip_opos;
            $data['name_elem'] = $name;
            $data['ip'] = $ip;
            $data['date'] = $start;
            $data['type'] = 'day';
            $writing = StatusOpo::create($data);
        }
        //        сделать запрос в базу и вытащить все, что надо передать в xml
        $to_xml = StatusOpo::where('type', '=', 'day')->where('date', $start)->get();
        Storage::disk('local')->put('StatusOpo_day.xml', XmlFacade::asXml($to_xml), 'public');
    }

    public function status_opo_day()   //список отчетов по дням
    {
        $title['main'] = "Отчет о состоянии опасных производственных объектов за день";
        $title['period']="За день";
        $title['adress'] = "status_opo";
        $data = StatusOpo::select('date', 'type')->where('type', '=', 'day')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function status_opo_day_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'day';
        $data = StatusOpo::where('date', '=', $date)->where('type', '=', 'day')->get();
        $start = $date;
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.status_opo', compact('data', 'start', 'finish', 'title'));
    }

    public function status_opo_month_data()   //загрузка данных в общую таблицу
    {
        $start = date('Y-m-01', strtotime(today().'- 1 month'));
        $finish = date("Y-m-t", strtotime($start));
        $input = Ref_opo::orderby('idOPO')->get();
        foreach ($input as $row){
            $name_opos = $row->descOPO;
            $ip_opos = $row->opo_to_calc_period_min->where('date', '>=', $start)->where('date', '<=', $finish)->first()->ip_opo;
            $ip = 1;
            foreach ($row->opo_to_obj as $item) {
                foreach ($item->elem_to_calc_report as $it){
                    if ($it->ip_elem <= $ip) {
                        $ip = $it->ip_elem;
                        $name = $item->nameObj;
                    }
                }
            }
            $data['name_opos'] = $name_opos;
            $data['ip_opos'] = $ip_opos;
            $data['name_elem'] = $name;
            $data['ip'] = $ip;
            $data['date'] = $start;
            $data['type'] = 'month';
            $writing = StatusOpo::create($data);
        }
    }

    public function status_opo_month()   //список отчетов по дням
    {
        $title['main'] = "Отчет о состоянии опасных производственных объектов за месяц";
        $title['period']="За месяц";
        $title['adress'] = "status_opo";
        $data = StatusOpo::select('date', 'type')->where('type', '=', 'month')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function status_opo_month_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'month';
        $data = StatusOpo::where('date', '=', $date)->where('type', '=', 'month')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        $finish_day = date("Y-".$month."-t", strtotime($start));
        $finish = date("Y-m-d H:i", strtotime($finish_day.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.status_opo', compact('data', 'start', 'finish', 'title'));
    }

    public function status_opo_quarter_data()   //загрузка данных в общую таблицу
    {
        $current_month = date('m', strtotime(today().'- 1 month'));
        if($current_month>=1 && $current_month<=3)
        {
            $start = date('Y-01-01');
            $finish = date('Y-03-t');
        }
        else  if($current_month>=4 && $current_month<=6)
        {
            $start = date('Y-04-01');
            $finish = date('Y-06-t');
        }
        else  if($current_month>=7 && $current_month<=9)
        {
            $start = date('Y-07-01');
            $finish = date('Y-09-t');
        }
        else  if($current_month>=10 && $current_month<=12)
        {
            $start = date('Y-10-01');
            $finish = date('Y-12-t');
        }
        $input = Ref_opo::orderby('idOPO')->get();
        foreach ($input as $row){
            $name_opos = $row->descOPO;
            $ip_opos = $row->opo_to_calc_period_min->where('date', '>=', $start)->where('date', '<=', $finish)->first()->ip_opo;
            $ip = 1;
            foreach ($row->opo_to_obj as $item) {
                foreach ($item->elem_to_calc_report as $it){
                    if ($it->ip_elem <= $ip) {
                        $ip = $it->ip_elem;
                        $name = $item->nameObj;
                    }
                }
            }
            $data['name_opos'] = $name_opos;
            $data['ip_opos'] = $ip_opos;
            $data['name_elem'] = $name;
            $data['ip'] = $ip;
            $data['date'] = $start;
            $data['type'] = 'quarter';
            $writing = StatusOpo::create($data);
        }
    }

    public function status_opo_quarter()   //список отчетов по дням
    {
        $title['main'] = "Отчет о состоянии опасных производственных объектов за квартал";
        $title['period']="За ";
        $title['adress'] = "status_opo";
        $data = StatusOpo::select('date', 'type')->where('type', '=', 'quarter')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function status_opo_quarter_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'quarter';
        $data = StatusOpo::where('date', '=', $date)->where('type', '=', 'quarter')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        if($month=="01")
        {
            $fin_date = date('Y-03-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-03-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="04")
        {
            $fin_date = date('Y-06-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-06-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="07")
        {
            $fin_date = date('Y-09-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-09-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="10")
        {
            $fin_date = date('Y-12-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-12-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        return view('web.docs.report_history.status_opo', compact('data', 'start', 'finish', 'title'));
    }

    /////////////////////Отчет о выявленных нарушениях////////////////////////////
    public function violation_report_day_data()   //загрузка данных в общую таблицу
    {
        $start = today();
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        $data_all = APK_SDK::orderby('id_apk')->where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        foreach ($data_all as $row){
            if (isset($row->APK_to_APK)){
                $data['desc_violation'] = $row->Details;
                $data['name_obj'] = $row->APK_to_elem->nameObj;
                $data['level_km'] = $row->level_km;
                $data['direction'] = $row->APK_to_APK->direction;
                $data['severity_fatal'] = $row->APK_to_APK->severity_fatal;
                $data['infi_repeat'] = $row->APK_to_APK->infi_repeat;
                $data['plan_work'] = $row->APK_to_APK->plan_work;
                $data['plan_date'] = $row->APK_to_APK->plan_date;
                $data['violation_status'] = $row->APK_to_APK->violation_status;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['date'] = $start;
                $data['type'] = 'day';
                $writing = ViolationsReport::create($data);
            }
        }
        //        сделать запрос в базу и вытащить все, что надо передать в xml
        $to_xml = ViolationsReport::where('type', '=', 'day')->where('date', $start)->get();
        Storage::disk('local')->put('ViolationsReport_day.xml', XmlFacade::asXml($to_xml), 'public');
    }

    public function violation_report_month_data()   //загрузка данных в общую таблицу
    {
        $start = date('Y-m-01', strtotime(today().'- 1 month'));
        $finish = date("Y-m-t", strtotime($start));
        $data_all = APK_SDK::orderby('id_apk')->where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        foreach ($data_all as $row){
            if (isset($row->APK_to_APK)){
                $data['desc_violation'] = $row->Details;
                $data['name_obj'] = $row->APK_to_elem->nameObj;
                $data['level_km'] = $row->level_km;
                $data['direction'] = $row->APK_to_APK->direction;
                $data['severity_fatal'] = $row->APK_to_APK->severity_fatal;
                $data['infi_repeat'] = $row->APK_to_APK->infi_repeat;
                $data['plan_work'] = $row->APK_to_APK->plan_work;
                $data['plan_date'] = $row->APK_to_APK->plan_date;
                $data['violation_status'] = $row->APK_to_APK->violation_status;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['date'] = $start;
                $data['type'] = 'month';
                $writing = ViolationsReport::create($data);
            }
        }
    }

    public function violation_report_quarter_data()   //загрузка данных в общую таблицу
    {
        $current_month = date('m', strtotime(today().'- 1 month'));
        if($current_month>=1 && $current_month<=3)
        {
            $start = date('Y-01-01');
            $finish = date('Y-03-t');
        }
        else  if($current_month>=4 && $current_month<=6)
        {
            $start = date('Y-04-01');
            $finish = date('Y-06-t');
        }
        else  if($current_month>=7 && $current_month<=9)
        {
            $start = date('Y-07-01');
            $finish = date('Y-09-t');
        }
        else  if($current_month>=10 && $current_month<=12)
        {
            $start = date('Y-10-01');
            $finish = date('Y-12-t');
        }
        $data_all = APK_SDK::orderby('id_apk')->where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        foreach ($data_all as $row){
            if (isset($row->APK_to_APK)){
                $data['desc_violation'] = $row->Details;
                $data['name_obj'] = $row->APK_to_elem->nameObj;
                $data['level_km'] = $row->level_km;
                $data['direction'] = $row->APK_to_APK->direction;
                $data['severity_fatal'] = $row->APK_to_APK->severity_fatal;
                $data['infi_repeat'] = $row->APK_to_APK->infi_repeat;
                $data['plan_work'] = $row->APK_to_APK->plan_work;
                $data['plan_date'] = $row->APK_to_APK->plan_date;
                $data['violation_status'] = $row->APK_to_APK->violation_status;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['plan_pers'] = $row->APK_to_APK->plan_pers;
                $data['date'] = $start;
                $data['type'] = 'quarter';
                $writing = ViolationsReport::create($data);
            }
        }
    }

    public function violations_report_day()   //список отчетов по дням
    {
        $title['main'] = "Отчет о выяленных нарушениях на опасных производственных объектах за день";
        $title['period']="За день";
        $title['adress'] = "violation_report";
        $data = ViolationsReport::select('date', 'type')->where('type', '=', 'day')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function violations_report_month()   //список отчетов по дням
    {
        $title['main'] = "Отчет о выяленных нарушениях на опасных производственных объектах за месяц";
        $title['period']="За ";
        $title['adress'] = "violation_report";
        $data = ViolationsReport::select('date', 'type')->where('type', '=', 'month')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function violations_report_quarter()   //список отчетов по дням
    {
        $title['main'] = "Отчет о выяленных нарушениях на опасных производственных объектах за квартал";
        $title['period']="За ";
        $title['adress'] = "violation_report";
        $data = ViolationsReport::select('date', 'type')->where('type', '=', 'quarter')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function violations_report_day_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'day';
        $data = ViolationsReport::where('date', '=', $date)->where('type', '=', 'day')->get();
        $start = $date;
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.violations_report', compact('data', 'start', 'finish', 'title'));
    }

    public function violations_report_month_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'month';
        $data = ViolationsReport::where('date', '=', $date)->where('type', '=', 'month')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        $finish_day = date("Y-".$month."-t", strtotime($start));
        $finish = date("Y-m-d H:i", strtotime($finish_day.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.violations_report', compact('data', 'start', 'finish', 'title'));
    }

    public function violations_report_quarter_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'quarter';
        $data = ViolationsReport::where('date', '=', $date)->where('type', '=', 'quarter')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        if($month=="01")
        {
            $fin_date = date('Y-03-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-03-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="04")
        {
            $fin_date = date('Y-06-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-06-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="07")
        {
            $fin_date = date('Y-09-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-09-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="10")
        {
            $fin_date = date('Y-12-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-12-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        return view('web.docs.report_history.violations_report', compact('data', 'start', 'finish', 'title'));
    }

    public function effect_pk_quarter()   //список отчетов по кварталам
    {
        $data = Operational_safety::orderbyDesc('id')->get()->groupBy('year');
        $id_year = 0;
        $data_in_index['num_year'][0] = '--';
        $data_in_index['num_quarter'][0][0]  = '--';
        foreach ($data as $key => $data_in_year){
            $data_in_index['num_year'][$id_year] = $key;
            $id_quarter = 0;
            foreach ($data_in_year->groupBy('quarter') as $key_quarter => $data_in_quarter){
                $data_in_index['num_quarter'][$id_year][$id_quarter] = $key_quarter;
                $id_quarter++;
            }
            $id_year++;
        }
        $title['main'] = "Отчет об эффективности производственного контроля за соблюдением требований промышленной безопасности по ОПО";
        $title['period']="За";
        $title['adress'] = "effect_pk";
        return view('web.docs.report_history.index_effect', compact('data_in_index', 'title'));
    }

    public function effect_pk_quarter_show($quarter, $year)
    {
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
        return view('web.docs.reports.effect_pk', compact('quarter', 'year', 'data'));
    }
/////АНАЛИЗ ПОВТОРЯЕМОСТИ
    public function repiat_report_day_data()   //загрузка данных в общую таблицу
    {
        $start = today();
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
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
        $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['percent_ok_all'][$id_OPO][$id_Obj][$id_violation] = '';
        $all_violation = count(APK_SDK::where('daterec', '>', date("Y-m-d", strtotime($start.'- 1 year')))->where('daterec', '<=', date("Y-m-d", strtotime($finish)))->where('infi_repeat', '!=', '0')->get());
        $data_all = APK_SDK::orderByDesc('id_apk')->where('infi_repeat', '!=', '0')->where('daterec', '<=', $finish)->where('daterec', '>=', $start)->get();
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
                    $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = 0;
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
                            $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] + 1;
                        }
                    }
                    $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = round($output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation]*100/$output_data['num_all'][$id_OPO][$id_Obj][$id_violation], 2);
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
                        $output_data['percent_ok_all'][$id_OPO][$id_obj][$id_violation] = round($output_data['percent_ok'][$id_OPO][$id_obj][$id_violation]*$output_data['num_all'][$id_OPO][$id_obj][$id_violation]/$all_violation, 2);
                        $data_in_table['name_opo'] = $output_data['name_opo'][$id_OPO];
                        $data_in_table['name_elem'] = $output_data['name_elem'][$id_OPO][$id_obj];
                        $data_in_table['name_violation'] = $output_data['name_violation'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_1_level'] = $output_data['num_1_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_2_level'] = $output_data['num_2_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_3_level'] = $output_data['num_3_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_4_level'] = $output_data['num_4_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['percent_ok'] = $output_data['percent_ok'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['percent_ok_all'] = $output_data['percent_ok_all'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_all'] = $output_data['num_all'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['date'] = date("Y-m-d", strtotime($start));
                        $data_in_table['type'] = 'day';
                        $writing = RepiatReport::create($data_in_table);
                    }
                }
            }
        }
        //        сделать запрос в базу и вытащить все, что надо передать в xml
        $to_xml = RepiatReport::where('type', '=', 'day')->where('date', $start)->get();
        Storage::disk('local')->put('RepiatReport_day.xml', XmlFacade::asXml($to_xml), 'public');
    }

    public function repiat_report_month_data()   //загрузка данных в общую таблицу
    {
        $start = date('Y-m-01', strtotime(today().'- 1 month'));
        $finish = date("Y-m-t", strtotime($start));
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
        $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['percent_ok_all'][$id_OPO][$id_Obj][$id_violation] = '';
        $all_violation = count(APK_SDK::where('daterec', '>', date("Y-m-d", strtotime($start.'- 1 year')))->where('daterec', '<=', date("Y-m-d", strtotime($finish)))->where('infi_repeat', '!=', '0')->get());
        $data_all = APK_SDK::orderByDesc('id_apk')->where('infi_repeat', '!=', '0')->where('daterec', '<=', $finish)->where('daterec', '>=', $start)->get();
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
                    $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = 0;
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
                            $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] + 1;
                        }
                    }
                    $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = round($output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation]*100/$output_data['num_all'][$id_OPO][$id_Obj][$id_violation], 2);
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
                        $output_data['percent_ok_all'][$id_OPO][$id_obj][$id_violation] = round($output_data['percent_ok'][$id_OPO][$id_obj][$id_violation]*$output_data['num_all'][$id_OPO][$id_obj][$id_violation]/$all_violation, 2);
                        $data_in_table['name_opo'] = $output_data['name_opo'][$id_OPO];
                        $data_in_table['name_elem'] = $output_data['name_elem'][$id_OPO][$id_obj];
                        $data_in_table['name_violation'] = $output_data['name_violation'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_1_level'] = $output_data['num_1_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_2_level'] = $output_data['num_2_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_3_level'] = $output_data['num_3_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_4_level'] = $output_data['num_4_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['percent_ok'] = $output_data['percent_ok'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['percent_ok_all'] = $output_data['percent_ok_all'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_all'] = $output_data['num_all'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['date'] = date("Y-m-d", strtotime($start));
                        $data_in_table['type'] = 'month';
                        $writing = RepiatReport::create($data_in_table);
                    }
                }
            }
        }
    }

    public function repiat_report_quarter_data()   //загрузка данных в общую таблицу
    {
        $current_month = date('m', strtotime(today().'- 1 month'));
        if($current_month>=1 && $current_month<=3)
        {
            $start = date('Y-01-01');
            $finish = date('Y-03-t');
        }
        else  if($current_month>=4 && $current_month<=6)
        {
            $start = date('Y-04-01');
            $finish = date('Y-06-t');
        }
        else  if($current_month>=7 && $current_month<=9)
        {
            $start = date('Y-07-01');
            $finish = date('Y-09-t');
        }
        else  if($current_month>=10 && $current_month<=12)
        {
            $start = date('Y-10-01');
            $finish = date('Y-12-t');
        }
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
        $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = '';
        $output_data['percent_ok_all'][$id_OPO][$id_Obj][$id_violation] = '';
        $all_violation = count(APK_SDK::where('daterec', '>', date("Y-m-d", strtotime($start.'- 1 year')))->where('daterec', '<=', date("Y-m-d", strtotime($finish)))->where('infi_repeat', '!=', '0')->get());
        $data_all = APK_SDK::orderByDesc('id_apk')->where('infi_repeat', '!=', '0')->where('daterec', '<=', $finish)->where('daterec', '>=', $start)->get();
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
                    $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = 0;
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
                            $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] + 1;
                        }
                    }
                    $output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation] = round($output_data['percent_ok'][$id_OPO][$id_Obj][$id_violation]*100/$output_data['num_all'][$id_OPO][$id_Obj][$id_violation], 2);
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
                        $output_data['percent_ok_all'][$id_OPO][$id_obj][$id_violation] = round($output_data['percent_ok'][$id_OPO][$id_obj][$id_violation]*$output_data['num_all'][$id_OPO][$id_obj][$id_violation]/$all_violation, 2);
                        $data_in_table['name_opo'] = $output_data['name_opo'][$id_OPO];
                        $data_in_table['name_elem'] = $output_data['name_elem'][$id_OPO][$id_obj];
                        $data_in_table['name_violation'] = $output_data['name_violation'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_1_level'] = $output_data['num_1_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_2_level'] = $output_data['num_2_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_3_level'] = $output_data['num_3_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_4_level'] = $output_data['num_4_level'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['percent_ok'] = $output_data['percent_ok'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['percent_ok_all'] = $output_data['percent_ok_all'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['num_all'] = $output_data['num_all'][$id_OPO][$id_obj][$id_violation];
                        $data_in_table['date'] = date("Y-m-d", strtotime($start));
                        $data_in_table['type'] = 'quarter';
                        $writing = RepiatReport::create($data_in_table);
                    }
                }
            }
        }
    }

    public function repiat_report_day()   //список отчетов по дням
    {
        $title['main'] = "Отчет \"Анализ повторяемости несоответствий\" за день";
        $title['period']="За день";
        $title['adress'] = "repiat_report";
        $data = RepiatReport::select('date', 'type')->where('type', '=', 'day')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function repiat_report_month()   //список отчетов по дням
    {
        $title['main'] = "Отчет \"Анализ повторяемости несоответствий\" за месяц ";
        $title['period']="За ";
        $title['adress'] = "repiat_report";
        $data = RepiatReport::select('date', 'type')->where('type', '=', 'month')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function repiat_report_quarter()   //список отчетов по дням
    {
        $title['main'] = "Отчет \"Анализ повторяемости несоответствий\" за квартал";
        $title['period']="За ";
        $title['adress'] = "repiat_report";
        $data = RepiatReport::select('date', 'type')->where('type', '=', 'quarter')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function repiat_report_day_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'day';
        $data = RepiatReport::where('date', '=', $date)->where('type', '=', 'day')->get();
        $start = $date;
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.repiat_report', compact('data', 'start', 'finish', 'title'));
    }

    public function repiat_report_month_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'month';
        $data = RepiatReport::where('date', '=', $date)->where('type', '=', 'month')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        $finish_day = date("Y-".$month."-t", strtotime($start));
        $finish = date("Y-m-d H:i", strtotime($finish_day.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.repiat_report', compact('data', 'start', 'finish', 'title'));
    }

    public function repiat_report_quarter_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'quarter';
        $data = RepiatReport::where('date', '=', $date)->where('type', '=', 'quarter')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        if($month=="01")
        {
            $fin_date = date('Y-03-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-03-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="04")
        {
            $fin_date = date('Y-06-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-06-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="07")
        {
            $fin_date = date('Y-09-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-09-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="10")
        {
            $fin_date = date('Y-12-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-12-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        return view('web.docs.report_history.repiat_report', compact('data', 'start', 'finish', 'title'));
    }

    //////////////О проведенных контрольных мероприятиях
    ///
    public function event_pk_day_data()   //загрузка данных в общую таблицу
    {
        $start = today();
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        $data_opo = Ref_opo::orderby('idOPO')->get();
        $data_SDK_APK = APK_SDK::orderby('idOPO')->where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        for ($i=1; $i<=count($data_opo); $i++){
            $data['name_opo'] = $data_opo->where('idOPO', $i)->first()->descOPO;
            $data['level_1_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 1));
            $data['level_2_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 2));
            $data['level_3_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 3));
            $data['level_4_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 4));
            $data['level_1_ok']= count($data_SDK_APK->where('idOPO', $i)->where('level_km', 1)->where('flComplete', '!=', 0));
            $data['level_2_ok'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 2)->where('flComplete', '!=', 0));
            $data['level_3_ok'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 3)->where('flComplete', '!=', 0));
            $data['level_4_ok'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 4)->where('flComplete', '!=', 0));
            $data['opo_all'] = $data['level_1_all'] + $data['level_2_all'] + $data['level_3_all'] + $data['level_4_all'];
            $data['date'] = $start;
            $data['type'] = 'day';
            $writing = EventPk::create($data);
        }
        //        сделать запрос в базу и вытащить все, что надо передать в xml
        $to_xml = EventPk::where('type', '=', 'day')->where('date', $start)->get();
        Storage::disk('local')->put('EventPk_day.xml', XmlFacade::asXml($to_xml), 'public');
    }

    public function event_pk_month_data()   //загрузка данных в общую таблицу
    {
        $start = date('Y-m-01', strtotime(today().'- 1 month'));
        $finish = date("Y-m-t", strtotime($start));
        $data_opo = Ref_opo::orderby('idOPO')->get();
        $data_SDK_APK = APK_SDK::orderby('idOPO')->where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        for ($i=1; $i<=count($data_opo); $i++){
            $data['name_opo'] = $data_opo->where('idOPO', $i)->first()->descOPO;
            $data['level_1_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 1));
            $data['level_2_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 2));
            $data['level_3_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 3));
            $data['level_4_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 4));
            $data['level_1_ok']= count($data_SDK_APK->where('idOPO', $i)->where('level_km', 1)->where('flComplete', '!=', 0));
            $data['level_2_ok'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 2)->where('flComplete', '!=', 0));
            $data['level_3_ok'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 3)->where('flComplete', '!=', 0));
            $data['level_4_ok'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 4)->where('flComplete', '!=', 0));
            $data['opo_all'] = $data['level_1_all'] + $data['level_2_all'] + $data['level_3_all'] + $data['level_4_all'];
            $data['date'] = $start;
            $data['type'] = 'month';
            $writing = EventPk::create($data);
        }
    }

    public function event_pk_quarter_data()   //загрузка данных в общую таблицу
    {
        $current_month = date('m', strtotime(today().'- 1 month'));
        if($current_month>=1 && $current_month<=3)
        {
            $start = date('Y-01-01');
            $finish = date('Y-03-t');
        }
        else  if($current_month>=4 && $current_month<=6)
        {
            $start = date('Y-04-01');
            $finish = date('Y-06-t');
        }
        else  if($current_month>=7 && $current_month<=9)
        {
            $start = date('Y-07-01');
            $finish = date('Y-09-t');
        }
        else  if($current_month>=10 && $current_month<=12)
        {
            $start = date('Y-10-01');
            $finish = date('Y-12-t');
        }
        $data_opo = Ref_opo::orderby('idOPO')->get();
        $data_SDK_APK = APK_SDK::orderby('idOPO')->where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        for ($i=1; $i<=count($data_opo); $i++){
            $data['name_opo'] = $data_opo->where('idOPO', $i)->first()->descOPO;
            $data['level_1_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 1));
            $data['level_2_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 2));
            $data['level_3_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 3));
            $data['level_4_all'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 4));
            $data['level_1_ok']= count($data_SDK_APK->where('idOPO', $i)->where('level_km', 1)->where('flComplete', '!=', 0));
            $data['level_2_ok'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 2)->where('flComplete', '!=', 0));
            $data['level_3_ok'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 3)->where('flComplete', '!=', 0));
            $data['level_4_ok'] = count($data_SDK_APK->where('idOPO', $i)->where('level_km', 4)->where('flComplete', '!=', 0));
            $data['opo_all'] = $data['level_1_all'] + $data['level_2_all'] + $data['level_3_all'] + $data['level_4_all'];
            $data['date'] = $start;
            $data['type'] = 'quarter';
            $writing = EventPk::create($data);
        }
    }

    public function event_pk_day()   //список отчетов по дням
    {
        $title['main'] = "Отчет о проведенных контрольных мероприятиях и выявленных нарушениях за день";
        $title['period']="За день";
        $title['adress'] = "event_pk";
        $data = EventPk::select('date', 'type')->where('type', '=', 'day')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function event_pk_month()   //список отчетов по дням
    {
        $title['main'] = "Отчет о проведенных контрольных мероприятиях и выявленных нарушениях за месяц ";
        $title['period']="За ";
        $title['adress'] = "event_pk";
        $data = EventPk::select('date', 'type')->where('type', '=', 'month')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function event_pk_quarter()   //список отчетов по дням
    {
        $title['main'] = "Отчет о проведенных контрольных мероприятиях и выявленных нарушениях за квартал";
        $title['period']="За ";
        $title['adress'] = "event_pk";
        $data = EventPk::select('date', 'type')->where('type', '=', 'quarter')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function event_pk_day_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'day';
        $data = EventPk::where('date', '=', $date)->where('type', '=', 'day')->get();
        $start = $date;
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.event_pk', compact('data', 'start', 'finish', 'title'));
    }

    public function event_pk_month_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'month';
        $data = EventPk::where('date', '=', $date)->where('type', '=', 'month')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        $finish_day = date("Y-".$month."-t", strtotime($start));
        $finish = date("Y-m-d H:i", strtotime($finish_day.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.event_pk', compact('data', 'start', 'finish', 'title'));
    }

    public function event_pk_quarter_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'quarter';
        $data = EventPk::where('date', '=', $date)->where('type', '=', 'quarter')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        if($month=="01")
        {
            $fin_date = date('Y-03-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-03-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="04")
        {
            $fin_date = date('Y-06-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-06-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="07")
        {
            $fin_date = date('Y-09-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-09-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="10")
        {
            $fin_date = date('Y-12-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-12-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        return view('web.docs.report_history.event_pk', compact('data', 'start', 'finish', 'title'));
    }

    /////////////////////Справка о выполнении актов, предписаний, выданных службой, отделом промышленной безопасности, ////////////////////////////
    public function quality_criteria_day_data()   //загрузка данных в общую таблицу
    {
        $start = today();
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        $data_all = APK_SDK::where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        $OPO_list = Ref_opo::orderBy('idOPO')->get();
        for ($i=1; $i<count($OPO_list)+1; $i++){
            $data['name_opo'] = $OPO_list->where('idOPO', $i)->first()->descOPO;
            $data['k1_red'] = count($data_all->where('idOPO', $i)->where('Weight', 6));
            $data['k1_yellow'] = count($data_all->where('idOPO', $i)->where('Weight', 0.3));
            $data['k1_green'] = count($data_all->where('idOPO', $i)->where('Weight', 0.11));
            $data['date'] = $start;
            $data['type'] = 'day';
            $writing = QualityCriteria::create($data);
        }
        //        сделать запрос в базу и вытащить все, что надо передать в xml
        $to_xml = QualityCriteria::where('type', '=', 'day')->where('date', $start)->get();
        Storage::disk('local')->put('QualityCriteria_day.xml', XmlFacade::asXml($to_xml), 'public');
    }

    public function quality_criteria_month_data()   //загрузка данных в общую таблицу
    {
        $start = date('Y-m-01', strtotime(today().'- 1 month'));
        $finish = date("Y-m-t", strtotime($start));
        $data_all = APK_SDK::where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        $OPO_list = Ref_opo::orderBy('idOPO')->get();

        for ($i=1; $i<count($OPO_list)+1; $i++){
            $data['name_opo'] = $OPO_list->where('idOPO', $i)->first()->descOPO;
            $data['k1_red'] = count($data_all->where('idOPO', $i)->where('Weight', 6));
            $data['k1_yellow'] = count($data_all->where('idOPO', $i)->where('Weight', 0.3));
            $data['k1_green'] = count($data_all->where('idOPO', $i)->where('Weight', 0.11));
            $data['date'] = $start;
            $data['type'] = 'month';
            $writing = QualityCriteria::create($data);
        }
    }

    public function quality_criteria_quarter_data()   //загрузка данных в общую таблицу
    {
        $current_month = date('m', strtotime(today().'- 1 month'));
        if($current_month>=1 && $current_month<=3)
        {
            $start = date('Y-01-01');
            $finish = date('Y-03-t');
        }
        else  if($current_month>=4 && $current_month<=6)
        {
            $start = date('Y-04-01');
            $finish = date('Y-06-t');
        }
        else  if($current_month>=7 && $current_month<=9)
        {
            $start = date('Y-07-01');
            $finish = date('Y-09-t');
        }
        else  if($current_month>=10 && $current_month<=12)
        {
            $start = date('Y-10-01');
            $finish = date('Y-12-t');
        }
        $data_all = APK_SDK::where('daterec', '<', $finish)->where('daterec', '>', $start)->get();
        $OPO_list = Ref_opo::orderBy('idOPO')->get();
        for ($i=1; $i<count($OPO_list)+1; $i++){
            $data['name_opo'] = $OPO_list->where('idOPO', $i)->first()->descOPO;
            $data['k1_red'] = count($data_all->where('idOPO', $i)->where('Weight', 6));
            $data['k1_yellow'] = count($data_all->where('idOPO', $i)->where('Weight', 0.3));
            $data['k1_green'] = count($data_all->where('idOPO', $i)->where('Weight', 0.11));
            $data['date'] = $start;
            $data['type'] = 'quarter';
            $writing = QualityCriteria::create($data);
        }
    }
    public function quality_criteria_day()   //список отчетов по дням
    {
        $title['main'] = "Справка о выполнении актов, предписаний, выданных службой, отделом промышленной безопасности, работником, ответственным за промышленную безопасность за день";
        $title['period']="За день";
        $title['adress'] = "quality_criteria";
        $data = QualityCriteria::select('date', 'type')->where('type', '=', 'day')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function quality_criteria_month()   //список отчетов по дням
    {
        $title['main'] = "Справка о выполнении актов, предписаний, выданных службой, отделом промышленной безопасности, работником, ответственным за промышленную безопасность за месяц ";
        $title['period']="За ";
        $title['adress'] = "quality_criteria";
        $data = QualityCriteria::select('date', 'type')->where('type', '=', 'month')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function quality_criteria_quarter()   //список отчетов по дням
    {
        $title['main'] = "Справка о выполнении актов, предписаний, выданных службой, отделом промышленной безопасности, работником, ответственным за промышленную безопасность за квартал";
        $title['period']="За ";
        $title['adress'] = "quality_criteria";
        $data = QualityCriteria::select('date', 'type')->where('type', '=', 'quarter')->groupBy('date')->groupBy('type')->orderByDesc('date')->get();
        return view('web.docs.report_history.index', compact('data', 'title'));
    }

    public function quality_criteria_day_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'day';
        $data = QualityCriteria::where('date', '=', $date)->where('type', '=', 'day')->get();
        $start = $date;
        $finish = date("Y-m-d H:i", strtotime($start.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.quality_criteria', compact('data', 'start', 'finish', 'title'));
    }

    public function quality_criteria_month_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'month';
        $data = QualityCriteria::where('date', '=', $date)->where('type', '=', 'month')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        $finish_day = date("Y-".$month."-t", strtotime($start));
        $finish = date("Y-m-d H:i", strtotime($finish_day.'+ 23 hour 59 minutes'));
        return view('web.docs.report_history.quality_criteria', compact('data', 'start', 'finish', 'title'));
    }

    public function quality_criteria_quarter_show($date)   //содержимое отчета за конкретный день
    {
        $title = 'quarter';
        $data = QualityCriteria::where('date', '=', $date)->where('type', '=', 'quarter')->get();
        $start = $date;
        $month = date('m', strtotime($start));
        if($month=="01")
        {
            $fin_date = date('Y-03-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-03-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="04")
        {
            $fin_date = date('Y-06-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-06-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="07")
        {
            $fin_date = date('Y-09-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-09-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        if($month=="10")
        {
            $fin_date = date('Y-12-01');
            $finish = date('Y-m-d H:i', strtotime(date("Y-12-t", strtotime($fin_date)).'+ 23 hour 59 minutes'));
        }
        return view('web.docs.report_history.quality_criteria', compact('data', 'start', 'finish', 'title'));
    }

}
