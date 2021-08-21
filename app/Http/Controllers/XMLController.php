<?php

namespace App\Http\Controllers;

use App\Jas;
use App\Models\Ref_obj;
use App\Models\Reports\Form51;
use App\Models\Reports\Form52;
use App\Models\Reports\Form52_table;
use App\Models\Reports\Form5363;
use App\Models\Reports\Form5363_table;
use App\Models\Reports\Form61;
use App\Models\Reports\Form62;
use App\Models\Rtn\Action_plan_pb;
use App\Models\Rtn\Data_check;
use App\Models\Rtn\Info_GDA;
use App\Models\Rtn\Pmla;
use App\Models\Rtn\Report_tu;
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
use App\Models\Rtn2\Realization;
use App\Models\Rtn2\Signed_data;
use App\Models\Rtn2\Status_tu;
use App\Models\Status_work;
use App\Models\XML_journal;
use App\Ref_opo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use XmlResponse\Facades\XmlFacade;

class XMLController extends Controller
{

    public function fifty_min()
    {
        $i=1;
        $ver_opo =  Ref_opo::find(1);
        //для записи в журнал
        $data['fullDescOPO'] = $ver_opo->fullDescOPO;
        $data['regNumOPO'] = $ver_opo->regNumOPO;
        $data['ip_opo'] = $ver_opo->opo_to_calc1->first()->ip_opo;
        $data['prognoz_ip_opo'] = $ver_opo->opo_sample_mons->first()->pro_ip_opo;
        $data['status'] = $ver_opo->opo_to_calc1->first()->calc_to_status->status;

        if ($ver_opo->opo_to_calc1->first()->ip_opo<0.8) {
            $elemet = Ref_obj::where('idOPO','=','1')->where('InUse','=','1')->where('status','=','50')->get();
            foreach ($elemet as $item)
            {
                if ($item->elem_to_calc->first()->ip_elem < 0.6)
                {
                    $obj ['factors'.$i++] = [
                        'Name_factor' => $item->nameObj,
                        'IP_factor' => $item->elem_to_calc->first()->ip_elem];
                }

            }
            $data['factors'] = $obj;

        }
        $data['date'] = date("Y-m-d");
        $data['time'] = date("H:i:s");
        XML_journal::create($data);
        Storage::disk('local')->put('15_min.xml', XmlFacade::asXml($data), 'public');
//        return response()->xml($data);   // Для тестов
//       Storage::disk('remote-sftp')->put('15_min.xml', $contents, 'public'); // Для передачи по SFTP
    }

    public function xml_obj()
    {
        $i=1;
        $elemet = Ref_obj::where('idOPO','=','1')->where('InUse','=','1')->where('status','=','50')->get(['idObj','nameObj', 'descObj']);
      //  return response()->xml($elemet);   // Для тестов
        Storage::disk('local')->put('reference_list.xml', XmlFacade::asXml($elemet), 'public');
    }
    public function events()
    {
        $Jas = Jas::orderByDesc('id')->first();
        $klass = $Jas->level;
        $desc = $Jas->name;
        $date_event = $Jas->data;
        $data = substr($date_event, 0, strpos($date_event, ' '));
        $vremya = substr($date_event, 10, strpos($date_event, ' '));
        $id_elem = $Jas->from_elem_opo;
        $descObj = Ref_obj::find($id_elem);
        $obj = $descObj->nameObj;

        $number_opo = $Jas->from_opo;
        $OPO = Ref_opo::find($number_opo);
        $name_OPO = $OPO->fullDescOPO;
        $reg_num = $OPO->regNumOPO;

        $date = date('m/d/Y');
        $time = date('h:i:s');

        $contents = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?> \n <Document xmlns=\"urn:iso:std:iso:20022:tech:xsd:pain.008.001.02\">\n";

        $contents = $contents."<do id = \"gda\">\n";
        $contents = $contents."<event>\n";
        //Описание события высокого риска (СВР) с указанием даты, времени
        $contents = $contents."<klass>$klass </klass>";
        //Наименование события согластно журналу событий
        $contents = $contents."<descript>$desc</descript>\n";
        //Регистрационный номер ОПО
        $contents = $contents."<regnumder_opo>$reg_num</regnumder_opo>\n";
        //Наименование ОПО
        $contents = $contents."<name_opo>$name_OPO</name_opo>\n";
        //Наименование элемента ОПО
        $contents = $contents."<name_obj>$obj</name_obj>\n";
        //Дата возникновения события
        $contents = $contents."<date_event>$data</date_event>\n";
        //Время возникновения события
        $contents = $contents."<time_event>$vremya</time_event>\n";
        $contents = $contents."</event> \n";
        //Дата и время формирования данных для передачи
        $contents = $contents."<date>$date</date>\n";
        $contents = $contents."<time>$time</time>\n";
        $contents = $contents."</do>\n";


        Storage::disk('local')->put('events.xml', $contents, 'public');
    }

    public function form51()
    {
        $data_form51 = Form51::orderByDesc('id')->first();

        $contents = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?> \n <Document xmlns=\"urn:iso:std:iso:20022:tech:xsd:pain.008.001.02\">\n";
        $contents = $contents."<form id=\"5.1\"> \n";

        $vid_1 = $data_form51->vid_1;
        $vid_2 = $data_form51->vid_2;
        $vid_3 = $data_form51->vid_3;
        $victim = $data_form51->victim;
        $date = $data_form51->date;
        $supervision = $data_form51->supervision;
        $organisation = $data_form51->organisation;
        $adress = $data_form51->adress;
        $place_accident = $data_form51->place_accident;
        $num_obj = $data_form51->num_obj;
        $result_acccident = $data_form51->result_acccident;
        $passed = $data_form51->passed;
        $accepted = $data_form51->accepted;
        $date_accept = $data_form51->date_accept;
        $reason_delay = $data_form51->reason_delay;

            $contents = $contents . "<vid_acccident>\n";
            $contents = $contents . "<vid_1>$vid_1</vid_1>\n";
            $contents = $contents . "<vid_2>$vid_2</vid_2>\n";
            $contents = $contents . "<vid_3>$vid_3</vid_3>\n";
            $contents = $contents . "</vid_acccident>\n";
            $contents = $contents . "<victim>$victim</victim>\n";
            $contents = $contents . "<date>$date</date>\n";
            $contents = $contents . "<supervision>$supervision</supervision>\n";
            $contents = $contents . "<organisation>$organisation</organisation>\n";
            $contents = $contents . "<adress>$adress</adress>\n";
            $contents = $contents . "<place_accident>$place_accident</place_accident>\n";
            $contents = $contents . "<num_obj>$num_obj</num_obj>\n";
            $contents = $contents . "<result_acccident>$result_acccident</result_acccident>\n";
            $contents = $contents . "<passed>$passed</passed>\n";
            $contents = $contents . "<accepted>$accepted</accepted>\n";
            $contents = $contents . "<date_accept>$date_accept</date_accept>\n";
            $contents = $contents . "<reason_delay>$reason_delay</reason_delay>\n";

            $contents = $contents."</form>\n";


        Storage::disk('local')->put('form51.xml', $contents, 'public');
    }

    public function form52()
    {
        $data_form52 = Form52::orderByDesc('id')->first();
        $contents = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?> \n <Document xmlns=\"urn:iso:std:iso:20022:tech:xsd:pain.008.001.02\">\n";
        $contents = $contents."<form id=\"5.2\">\n";

        $act_num = $data_form52->act_num;
        $tag_unitGDA = $data_form52->tag_unitGDA;
        $date_accident = $data_form52->date_accident;
        $name_object = $data_form52->name_object;
        $predsed = $data_form52->predsed;
        $data_predsed = $data_form52->data_predsed;
        $zam_predsed = $data_form52->zam_predsed;
        $data_zam = $data_form52->data_zam;
        $characteristic = $data_form52->characteristic;
        $info_accident = $data_form52->info_accident;
        $reason_accident = $data_form52->reason_accident;
        $result = $data_form52->result;
        $stop_time = $data_form52->stop_time;
        $result_acccident = $data_form52->result_acccident;
        $data_comission = $data_form52->data_comission;

        $contents = $contents . "<act_num>$act_num</act_num>\n";
        $contents = $contents . "<tag_unitGDA>$tag_unitGDA</unitGDA>\n";
        $contents = $contents . "<date_accident>$date_accident</date_accident>\n";
        $contents = $contents . "<name_object>$name_object</name_object>\n";
        $contents = $contents . "<comission>\n";
        $contents = $contents . "<predsed>$predsed</predsed>\n";
        $contents = $contents . "<data_predsed>$data_predsed</data_predsed>\n";
        $contents = $contents . "<zam_predsed>$zam_predsed</zam_predsed>\n";
        $contents = $contents . "<data_zam>$data_zam</zam_predsed>\n";
        $contents = $contents . "<data_comission>$data_comission</data_comission>\n";
        $contents = $contents . "</comission>\n";
        $contents = $contents . "<characteristic>$characteristic</characteristic>\n";
        $contents = $contents . "<info_accident>$info_accident</info_accident>\n";
        $contents = $contents . "<reason_accident>$reason_accident</reason_accident>\n";
        $contents = $contents . "<result>$result</result>\n";
        $contents = $contents . "<stop_time>$stop_time</stop_time>\n";
        $contents = $contents . "<result_acccident>$result_acccident</result_acccident>\n";

        $info_table = Form52_table::orderBy('num')->where('id_act', '=', $data_form52->id)->get();

        foreach ($info_table as $item) {
            $num = $item->num;
            $context = $item->context;
            $responsible = $item->responsible;
            $time_event = $item->time_event;
            $note = $item->note;

            $contents = $contents."<event id=\"$num\">\n";
            $contents = $contents . "<context>$context</context>\n";
            $contents = $contents . "<responsible>$responsible</responsible>\n";
            $contents = $contents . "<time_event>$time_event</time_event>\n";
            $contents = $contents . "<note>$note</note>\n";
            $contents = $contents."</event>\n";
        }

        $same_accident = $data_form52->same_accident;
        $act_date = $data_form52->act_date;
        $app = $data_form52->app;

        $contents = $contents . "<same_accident>$same_accident</same_accident>\n";
        $contents = $contents . "<act_date>$act_date</act_date>\n";
        $contents = $contents . "<app>$app</app>\n";
        $contents = $contents."</form>\n";


        Storage::disk('local')->put('form52.xml', $contents, 'public');
    }


    public function form5363(){

        $contents = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?> \n <Document xmlns=\"urn:iso:std:iso:20022:tech:xsd:pain.008.001.02\">\n";
        $contents = $contents."<form id=\"5.3, 6.3\">\n";

        $act_info = Form5363::orderByDesc('id')->first();
        $act_num = $act_info->id;
        $event_info = Form5363_table::orderBy('num_event')->where('id_act', '=', $act_num)->get();
        $date1 = $act_info->date1;
        $date2 = $act_info->date2;

        $contents = $contents . "<id_act>$act_num</id_act>\n";
        $contents = $contents . "<date1>$date1</date1>\n";
        $contents = $contents . "<date2>$date2</date2>\n";

        foreach ($event_info as $item) {
            $num_event = $item->num_event;
            $date = $item->date;
            $place = $item->place;
            $data_act = $item->date_act;
            $event = $item->event;
            $time_event = $item->time_event;
            $check_event = $item->check_event;
            $info = $item->info;

            $contents = $contents."<event id=\"$num_event\">\n";
            $contents = $contents . "<date>$date</date>\n";
            $contents = $contents . "<place>$place</place>\n";
            $contents = $contents . "<data_act>$data_act</data_act>\n";
            $contents = $contents . "<event>$event</event>\n";
            $contents = $contents . "<time_event>$time_event</time_event>\n";
            $contents = $contents . "<check_event>$check_event</check_event>\n";
            $contents = $contents . "<info>$info</info>\n";
            $contents = $contents."</event>\n";
        }

        $partGDA = $act_info->partGDA;
        $app = $act_info->app;
        $namePB = $act_info->namePB;

        $contents = $contents . "<partGDA>$partGDA</partGDA>\n";
        $contents = $contents . "<app>$app</app>\n";
        $contents = $contents . "<namePB>$namePB</namePB>\n";


        $contents = $contents."</form>\n";
        Storage::disk('local')->put('form5363.xml', $contents, 'public');
    }

    public function form61()
    {
        $data_form61 = Form61::orderByDesc('id')->first();

        $contents = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?> \n <Document xmlns=\"urn:iso:std:iso:20022:tech:xsd:pain.008.001.02\">\n";
        $contents = $contents."<form id=\"6.1\"> \n";

        $vid_1 = $data_form61->vid_1;
        $vid_2 = $data_form61->vid_2;
        $vid_3 = $data_form61->vid_3;
        $vid_4 = $data_form61->vid_4;
        $vid_5 = $data_form61->vid_5;
        $vid_6 = $data_form61->vid_6;
        $victim = $data_form61->victim;
        $date = $data_form61->date;
        $supervision = $data_form61->supervision;
        $name_organisation = $data_form61->name_organisation;
        $adress = $data_form61->adress;
        $place = $data_form61->place;
        $num_obj = $data_form61->num_obj;
        $desc_accident = $data_form61->desc_accident;
        $event_organisation = $data_form61->event_organisation;
        $passed = $data_form61->event_organisation;
        $accepted = $data_form61->accepted;
        $date_accept = $data_form61->date_accept;
        $reason_delay = $data_form61->reason_delay;

        $contents = $contents . "<vid_acccident>\n";
        $contents = $contents . "<vid_1>$vid_1</vid_1>\n";
        $contents = $contents . "<vid_2>$vid_2</vid_2>\n";
        $contents = $contents . "<vid_3>$vid_3</vid_3>\n";
        $contents = $contents . "<vid_4>$vid_4</vid_4>\n";
        $contents = $contents . "<vid_5>$vid_5</vid_5>\n";
        $contents = $contents . "<vid_6>$vid_6</vid_6>\n";
        $contents = $contents . "</vid_acccident>\n";
        $contents = $contents . "<victim>$victim</victim>\n";
        $contents = $contents . "<date>$date</date>\n";
        $contents = $contents . "<supervision>$supervision</supervision>\n";
        $contents = $contents . "<name_organisation>$name_organisation</name_organisation>\n";
        $contents = $contents . "<adress>$adress</adress>\n";
        $contents = $contents . "<place>$place</place>\n";
        $contents = $contents . "<num_obj>$num_obj</num_obj>\n";
        $contents = $contents . "<desc_accident>$desc_accident</desc_accident>\n";
        $contents = $contents . "<event_organisation>$event_organisation</event_organisation>\n";
        $contents = $contents . "<passed>$passed</passed>\n";
        $contents = $contents . "<accepted>$accepted</accepted>\n";
        $contents = $contents . "<date_accept>$date_accept</date_accept>\n";
        $contents = $contents . "<reason_delay>$reason_delay</reason_delay>\n";

        $contents = $contents."</form>\n";

        Storage::disk('local')->put('form61.xml', $contents, 'public');

    }

    public function form62()
    {
        $data_form62 = Form62::orderByDesc('id')->first();

        $contents = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?> \n <Document xmlns=\"urn:iso:std:iso:20022:tech:xsd:pain.008.001.02\">\n";
        $contents = $contents."<form id=\"6.2\"> \n";

        $info_organisation = $data_form62->info_organisation;
        $predsed = $data_form62->predsed;
        $data_predsed = $data_form62->data_predsed;
        $data_comission = $data_form62->data_comission;
        $char_organisation = $data_form62->char_organisation;
        $info_worker = $data_form62->info_worker;
        $info_acccident = $data_form62->info_acccident;
        $tech_reason = $data_form62->tech_reason;
        $organisation_reason = $data_form62->organisation_reason;
        $other_reason = $data_form62->other_reason;
        $event = $data_form62->event;
        $result = $data_form62->result;
        $result_acccident = $data_form62->result_acccident;
        $act_date = $data_form62->act_date;
        $description = $data_form62->description;
        $date_accident = $data_form62->date_accident;


        $contents = $contents . "<info_organisation>$info_organisation</info_organisation>\n";
        $contents = $contents . "<comission>\n";
        $contents = $contents . "<predsed>$predsed</predsed>\n";
        $contents = $contents . "<data_predsed>$data_predsed</data_predsed>\n";
        $contents = $contents . "<consist_comm>$data_comission</consist_comm>\n";
        $contents = $contents . "</comission>\n";
        $contents = $contents . "<char_organisation>$char_organisation</char_organisation>\n";
        $contents = $contents . "<info_worker>$info_worker</info_worker>\n";
        $contents = $contents . "<date_accident>$date_accident</date_accident>\n";
        $contents = $contents . "<result_acccident>$info_acccident</result_acccident>\n";
        $contents = $contents . "<reason_accident>\n";
        $contents = $contents . "<tech_reason>$tech_reason</tech_reason>\n";
        $contents = $contents . "<organisation_reason>$organisation_reason</organisation_reason>\n";
        $contents = $contents . "<other_reason>$other_reason</other_reason>\n";
        $contents = $contents . "</reason_accident>\n";
        $contents = $contents . "<event>$event</event>\n";
        $contents = $contents . "<result>$result</result>\n";
        $contents = $contents . "<result_acccident>$result_acccident</result_acccident>\n";
        $contents = $contents . "<act_date>$act_date</act_date>\n";
        $contents = $contents . "<description>$description</description>\n";

        $contents = $contents."</form>\n";


        Storage::disk('local')->put('form62.xml', $contents, 'public');
    }

    public function year()
    {
        $name_organisation = Info_GDA::find(1)->values;
        $id_organisation = Info_GDA::find(2)->values;
        $inn_organisation = Info_GDA::find(3)->values;
        $ogrn_organisation = Info_GDA::find(4)->values;
        $kpp_organisation = Info_GDA::find(5)->values;
        $start_organisation = Info_GDA::find(6)->values;
        $finish_organisation = Info_GDA::find(7)->values;


                $contents = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?> \n <Document xmlns=\"urn:iso:std:iso:20022:tech:xsd:pain.008.001.02\">\n";

        $contents = $contents."<do id = \"gda\">\n";
        //данные организации
        $contents = $contents."<organization_info>\n";
        $contents = $contents."<name>$name_organisation</name>\n";
        $contents = $contents."<id>$id_organisation</id>\n";
        $contents = $contents."<inn>$inn_organisation</inn>\n";
        $contents = $contents."<ogrn>$ogrn_organisation</ogrn>\n";
        $contents = $contents."<kpp>$kpp_organisation</kpp>\n";
        $contents = $contents."<start_period>$start_organisation</start_period>\n";
        $contents = $contents."<finish_period>$finish_organisation</finish_period>\n";
        $contents = $contents."</organization_info>\n";

        //раздел 1.1
        $info_polis = Info_insurance::orderBy('id')->get();

        $contents = $contents."<info_insurance>\n";
        $contents = $contents."<info_polis>\n";

        foreach ($info_polis as $item) {
            $num_opo = $item->num_opo;
            $num_polis = $item->num_polis;
            $time = $item->time;
            $id_polis = $item->id;

            $contents = $contents."<record id=\"$id_polis\">\n";
            $contents = $contents . "<num_opo>$num_opo</num_opo>\n";
            $contents = $contents . "<num_polis>$num_polis</num_polis>\n";
            $contents = $contents . "<time>$time</time>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</info_polis>\n";
        $contents = $contents."</info_insurance>\n";

        //раздел 2
        $contents = $contents."<info_worker>\n";

        $organisation = Organisation::orderBy('id')->get();
        $realisation = Realization::orderBy('id')->get();
        $info_pk = Info_pk::orderBy('id')->get();

        //раздел 2.1
        $contents = $contents."<organisation>\n";
        foreach ($organisation as $item) {
            $num_opo1 = $item->num_opo;
            $name_f = $item->name_f;
            $name_n = $item->name_n;
            $name_o = $item->name_o;
            $post = $item->post;
            $education = $item->education;
            $experiens = $item->experiens;
            $id_org = $item->id;

            $contents = $contents."<record id=\"$id_org\">\n";
            $contents = $contents . "<num_opo>$num_opo1</num_opo>\n";
            $contents = $contents . "<name_f>$name_f</name_f>\n";
            $contents = $contents . "<name_n>$name_n</name_n>\n";
            $contents = $contents . "<name_o>$name_o</name_o>\n";
            $contents = $contents . "<post>$post</post>\n";
            $contents = $contents . "<education>$education</education>\n";
            $contents = $contents . "<experiens>$experiens</experiens>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</organisation>\n";

        //раздел 2.2
        $contents = $contents."<realization>\n";
        foreach ($realisation as $item) {
            $num_opo2 = $item->num_opo;
            $name_f1 = $item->name_f;
            $name_n1 = $item->name_n;
            $name_o1 = $item->name_o;
            $post1 = $item->post;
            $education1 = $item->education;
            $experiens1 = $item->experiens;
            $id_real = $item->id;
            $last_sert = $item->last_sert;

            $contents = $contents."<record id=\"$id_real\">\n";
            $contents = $contents . "<num_opo>$num_opo2</num_opo>\n";
            $contents = $contents . "<name_f>$name_f1</name_f>\n";
            $contents = $contents . "<name_n>$name_n1</name_n>\n";
            $contents = $contents . "<name_o>$name_o1</name_o>\n";
            $contents = $contents . "<post>$post1</post>\n";
            $contents = $contents . "<education>$education1</education>\n";
            $contents = $contents . "<experiens>$experiens1</experiens>\n";
            $contents = $contents . "<last_sert>$last_sert</last_sert>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</realization>\n";

        //раздел 2.3
        $contents = $contents."<info_pk>\n";
        foreach ($info_pk as $item) {
            $num_opo3 = $item->num_opo;
            $date = $item->date;
            $doc = $item->doc;
            $id_pk = $item->id;

            $contents = $contents."<record id=\"$id_pk\">\n";
            $contents = $contents . "<num_opo>$num_opo3</num_opo>\n";
            $contents = $contents . "<date>$date</date>\n";
            $contents = $contents . "<doc>$doc</doc>\n";

            $contents = $contents."</record>\n";
        }
        $contents = $contents."</info_pk>\n";
        $contents = $contents."</info_worker>\n";

        //раздел 3
        $info_manage_system = Info_manage_system::orderBy('id')->get();
        $contents = $contents."<info_manage_system>\n";

        foreach ($info_manage_system as $item) {
            $id_sys = $item->id;
            $num_opo4 = $item->num_opo;
            $date_act = $item->date_act;
            $date_plan_from = $item->date_plan_from;
            $period_event = $item->period_event;
            $analitic = $item->analitic;

            $contents = $contents."<record id=\"$id_sys\">\n";
            $contents = $contents . "<num_opo>$num_opo4</num_opo>\n";
            $contents = $contents . "<date_act>$date_act</date_act>\n";
            $contents = $contents . "<date_plan_from>$date_plan_from</date_plan_from>\n";
            $contents = $contents . "<period_event>$period_event</period_event>\n";
            $contents = $contents . "<analitic>$analitic</analitic>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</info_manage_system>\n";

        //раздел 4
        $info_plan = Info_plan::orderBy('id')->get();
        $contents = $contents."<info_plan>\n";

        foreach ($info_plan as $item) {
            $id_plan = $item->id;
            $num_opo5 = $item->num_opo;
            $name_event = $item->name_event;
            $date_accept = $item->date_accept;
            $check_event = $item->check_event;
            $file = $item->file;
            $reason_nonpref = $item->reason_nonpref;
            $recvisits_1 = $item->recvisits_1;
            $recvisits_2 = $item->recvisits_2;
            $check_require = $item->check_require;
            $doc1 = $item->doc;
            $reason_nonpref_require = $item->reason_nonpref_require;

            $contents = $contents."<record id=\"$id_plan\">\n";
            $contents = $contents . "<num_opo>$num_opo5</num_opo>\n";
            $contents = $contents . "<name_event>$name_event</name_event>\n";
            $contents = $contents . "<date_accept>$date_accept</date_accept>\n";
            $contents = $contents . "<check_event>$check_event</check_event>\n";
            $contents = $contents . "<file>$file</file>\n";
            $contents = $contents . "<reason_nonpref>$reason_nonpref</reason_nonpref>\n";
            $contents = $contents . "<recvisits_1>$recvisits_1</recvisits_1>\n";
            $contents = $contents . "<recvisits_2>$recvisits_2</recvisits_2>\n";
            $contents = $contents . "<check_require>$check_require</check_require>\n";
            $contents = $contents . "<doc>$doc1</doc>\n";
            $contents = $contents . "<reason_nonpref_require>$reason_nonpref_require</reason_nonpref_require>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</info_plan>\n";

        //раздел 5
        $contents = $contents."<result_cheking>\n";
        //раздел 5.1
        $contents = $contents."<kol_vo_checking>\n";
        $kol_vo_checking = Kol_vo_checking::orderBy('id')->get();

        foreach ($kol_vo_checking as $item) {
            $id_checking = $item->id;
            $num_opo6 = $item->num_opo;
            $kol_vo_breach = $item->kol_vo_breach;
            $kol_vo_breach_nonpref = $item->kol_vo_breach_nonpref;
            $kol_vo_attraction = $item->kol_vo_attraction;

            $contents = $contents."<record id=\"$id_checking\">\n";
            $contents = $contents . "<num_opo>$num_opo6</num_opo>\n";
            $contents = $contents . "<kol_vo_breach>$kol_vo_breach</kol_vo_breach>\n";
            $contents = $contents . "<kol_vo_breach_nonpref>$kol_vo_breach_nonpref</kol_vo_breach_nonpref>\n";
            $contents = $contents . "<kol_vo_breach_nonpref>$kol_vo_breach_nonpref</kol_vo_breach_nonpref>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</kol_vo_checking>\n";
        //раздел 5.2
        $contents = $contents."<info_stop_work>\n";
        //раздел 5.2.1
        $contents = $contents."<name_work>\n";

        $name_work = Name_work::orderBy('id')->get();

        foreach ($name_work as $item) {
            $id_work = $item->id;
            $num_opo7 = $item->num_opo;
            $name_job = $item->name_job;
            $name_tu = $item->name_tu;
            $reason_stop = $item->reason_stop;
            $time_stop = $item->time_stop;
            $check_event = $item->check_event;
            $date_act = $item->date_act;
            $num_act = $item->num_act;

            $contents = $contents."<record id=\"$id_work\">\n";
            $contents = $contents . "<num_opo>$num_opo7</num_opo>\n";
            $contents = $contents . "<name_job>$name_job</name_job>\n";
            $contents = $contents . "<name_tu>$name_tu</name_tu>\n";
            $contents = $contents . "<reason_stop>$reason_stop</reason_stop>\n";
            $contents = $contents . "<time_stop>$time_stop</time_stop>\n";
            $contents = $contents . "<check_event>$check_event</check_event>\n";
            $contents = $contents . "<date_act>$date_act</date_act>\n";
            $contents = $contents . "<num_act>$num_act</num_act>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</name_work>\n";
        $contents = $contents."</info_stop_work>\n";
        //раздел 5.3
        $contents = $contents."<offers>\n";
        $offers = Offers::orderBy('id')->get();
        foreach ($offers as $item) {
            $id_offer = $item->id;
            $num_opo8 = $item->num_opo;
            $offer_list = $item->offer_list;
            $event = $item->event;

            $contents = $contents."<record id=\"$id_offer\">\n";
            $contents = $contents . "<num_opo>$num_opo8</num_opo>\n";
            $contents = $contents . "<offer_list>$offer_list</offer_list>\n";
            $contents = $contents . "<event>$event</event>\n";
            $contents = $contents."</record>\n";
        }

        $contents = $contents."</offers>\n";
        $contents = $contents."</result_cheking>\n";

        //раздел 6
        $contents = $contents."<info_tu>\n";
        //раздел 6.1
        $contents = $contents."<general_info>\n";
        $general_info = General_info::orderBy('id')->get();

        foreach ($general_info as $item) {
            $id_info = $item->id;
            $num_opo9 = $item->num_opo;
            $kol_vo_building = $item->kol_vo_building;
            $kol_vo_build = $item->kol_vo_build;
            $kol_vo_operated_obj = $item->kol_vo_operated_obj;
            $kol_vo_nonoperated_obj = $item->kol_vo_nonoperated_obj;

            $contents = $contents."<record id=\"$id_info\">\n";
            $contents = $contents . "<num_opo>$num_opo9</num_opo>\n";
            $contents = $contents . "<kol_vo_building>$kol_vo_building</kol_vo_building>\n";
            $contents = $contents . "<kol_vo_build>$kol_vo_build</kol_vo_build>\n";
            $contents = $contents . "<kol_vo_operated_obj>$kol_vo_operated_obj</kol_vo_operated_obj>\n";
            $contents = $contents . "<kol_vo_nonoperated_obj>$kol_vo_nonoperated_obj</kol_vo_nonoperated_obj>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</general_info>\n";
        //раздел 6.2
        $contents = $contents."<info_building>\n";
        $info_building = Info_building::orderBy('id')->get();

        foreach ($info_building as $item) {
            $id_bild = $item->id;
            $num_opo10 = $item->num_opo;
            $name = $item->name;
            $year_exp = $item->year_exp;
            $date_reconstruction = $item->date_reconstruction;
            $date_repair = $item->date_repair;
            $date_next_check = $item->date_next_check;
            $date_check = $item->date_check;
            $result_check = $item->result_check;
            $percent_event = $item->percent_event;
            $file = $item->file;

            $contents = $contents."<record id=\"$id_bild\">\n";
            $contents = $contents . "<num_opo>$num_opo10</num_opo>\n";
            $contents = $contents . "<name>$name</name>\n";
            $contents = $contents . "<year_exp>$year_exp</year_exp>\n";
            $contents = $contents . "<date_reconstruction>$date_reconstruction</date_reconstruction>\n";
            $contents = $contents . "<date_repair>$date_repair</date_repair>\n";
            $contents = $contents . "<date_next_check>$date_next_check</date_next_check>\n";
            $contents = $contents . "<date_check>$date_check</date_check>\n";
            $contents = $contents . "<result_check>$result_check</result_check>\n";
            $contents = $contents . "<percent_event>$percent_event</percent_event>\n";
            $contents = $contents . "<file>$file</file>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</info_building>\n";

        //раздел 6.3
        $contents = $contents."<info_tu>\n";
        $info_tu = Info_tu::orderBy('id')->get();

        foreach ($info_tu as $item) {
            $id_tu = $item->id;
            $num_opo11 = $item->num_opo;
            $kol_vo_tu = $item->kol_vo_tu;
            $kol_vo_old_tu = $item->kol_vo_old_tu;
            $file_tu_out = $item->file_tu_out;
            $kol_vo_repair_tu = $item->kol_vo_repair_tu;
            $file_tu_repair = $item->file_tu_repair;

            $contents = $contents."<record id=\"$id_tu\">\n";
            $contents = $contents . "<num_opo>$num_opo11</num_opo>\n";
            $contents = $contents . "<kol_vo_tu>$kol_vo_tu</kol_vo_tu>\n";
            $contents = $contents . "<kol_vo_old_tu>$kol_vo_old_tu</kol_vo_old_tu>\n";
            $contents = $contents . "<file_tu_out>$file_tu_out</file_tu_out>\n";
            $contents = $contents . "<kol_vo_repair_tu>$kol_vo_repair_tu</kol_vo_repair_tu>\n";
            $contents = $contents . "<file_tu_repair>$file_tu_repair</file_tu_repair>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</info_tu>\n";

        //раздел 6.4
        $contents = $contents."<status_tu>\n";
        $status_tu = Status_tu::orderBy('id')->get();

        foreach ($status_tu as $item) {
            $id_status = $item->id;
            $num_opo11 = $item->num_opo;
            $num_tu = $item->num_tu;
            $name_tu = $item->name_tu;
            $serial_num = $item->serial_num;
            $industrial_num = $item->industrial_num;
            $invent_num = $item->invent_num;
            $type_auto = $item->type_auto;
            $type = $item->type;
            $vid_auto = $item->vid_auto;
            $vid = $item->vid;
            $mark = $item->mark;
            $country = $item->country;
            $time_exp = $item->time_exp;
            $year_exp = $item->year_exp;
            $old_percent = $item->old_percent;
            $repair_info = $item->repair_info;
            $num_doc = $item->num_doc;
            $doc_check = $item->doc_check;
            $date_check = $item->date_check;
            $result_check = $item->result_check;
            $info_event_check = $item->info_event_check;
            $accept_time = $item->accept_time;
            $accept_kol_vo = $item->accept_kol_vo;
            $fact_time = $item->fact_time;
            $fact_kol_vo = $item->fact_kol_vo;
            $check_control = $item->check_control;
            $info_demo_tu = $item->info_demo_tu;
            $time_demo = $item->time_demo;
            $info_devices = $item->info_devices;
            $info_event = $item->info_event;
            $tu_repair_check = $item->tu_repair_check;
            $num_new_tu = $item->num_new_tu;

            $contents = $contents."<record id=\"$id_status\">\n";
            $contents = $contents . "<num_opo>$num_opo11</num_opo>\n";
            $contents = $contents . "<num_tu>$num_tu</num_tu>\n";
            $contents = $contents . "<name_tu>$name_tu</name_tu>\n";
            $contents = $contents . "<serial_num>$serial_num</serial_num>\n";
            $contents = $contents . "<industrial_num>$industrial_num</industrial_num>\n";
            $contents = $contents . "<invent_num>$invent_num</invent_num>\n";
            $contents = $contents . "<type_auto>$type_auto</type_auto>\n";
            $contents = $contents . "<type>$type</type>\n";
            $contents = $contents . "<vid_auto>$vid_auto</vid_auto>\n";
            $contents = $contents . "<vid>$vid</vid>\n";
            $contents = $contents . "<mark>$mark</mark>\n";
            $contents = $contents . "<country>$country</country>\n";
            $contents = $contents . "<time_exp>$time_exp</time_exp>\n";
            $contents = $contents . "<year_exp>$year_exp</year_exp>\n";
            $contents = $contents . "<old_percent>$old_percent</old_percent>\n";
            $contents = $contents . "<repair_info>$repair_info</repair_info>\n";
            $contents = $contents . "<num_doc>$num_doc</num_doc>\n";
            $contents = $contents . "<doc_check>$doc_check</doc_check>\n";
            $contents = $contents . "<date_check>$date_check</date_check>\n";
            $contents = $contents . "<result_check>$result_check</result_check>\n";
            $contents = $contents . "<info_event_check>$info_event_check</info_event_check>\n";
            $contents = $contents . "<accept_time>$accept_time</accept_time>\n";
            $contents = $contents . "<accept_kol_vo>$accept_kol_vo</accept_kol_vo>\n";
            $contents = $contents . "<fact_time>$fact_time</fact_time>\n";
            $contents = $contents . "<fact_kol_vo>$fact_kol_vo</fact_kol_vo>\n";
            $contents = $contents . "<check_control>$check_control</check_control>\n";
            $contents = $contents . "<info_demo_tu>$info_demo_tu</info_demo_tu>\n";
            $contents = $contents . "<time_demo>$time_demo</time_demo>\n";
            $contents = $contents . "<info_devices>$info_devices</info_devices>\n";
            $contents = $contents . "<info_event>$info_event</info_event>\n";
            $contents = $contents . "<tu_repair_check>$tu_repair_check</tu_repair_check>\n";
            $contents = $contents . "<num_new_tu>$num_new_tu</num_new_tu>\n";
            $contents = $contents."</record>\n";
        }

        $contents = $contents."</status_tu>\n";
        $contents = $contents."</info_tu>\n";

        //раздел 7
        $contents = $contents."<info_accident>\n";
        //раздел 7.1
        $contents = $contents."<info_accident_investigation>\n";
        $info_accident_investigation = Info_accident_investigation::orderBy('id')->get();
        foreach ($info_accident_investigation as $item) {
            $id_accident = $item->id;
            $num_opo12 = $item->num_opo;
            $type_accident = $item->type_accident;
            $desc_accident = $item->desc_accident;
            $place = $item->place;
            $date_accident = $item->date_accident;
            $respons_worker = $item->respons_worker;
            $check_event = $item->check_event;
            $event = $item->event;

            $contents = $contents."<record id=\"$id_accident\">\n";
            $contents = $contents . "<num_opo>$num_opo12</num_opo>\n";
            $contents = $contents . "<type_accident>$type_accident</type_accident>\n";
            $contents = $contents . "<desc_accident>$desc_accident</desc_accident>\n";
            $contents = $contents . "<place>$place</place>\n";
            $contents = $contents . "<date_accident>$date_accident</date_accident>\n";
            $contents = $contents . "<respons_worker>$respons_worker</respons_worker>\n";
            $contents = $contents . "<check_event>$check_event</check_event>\n";
            $contents = $contents . "<event>$event</event>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</info_accident_investigation>\n";

        //раздел 7.2
        $contents = $contents."<act_reason_accident>\n";
        $act_reason_accident = Act_reason_accident::orderBy('id')->get();
        foreach ($act_reason_accident as $item) {
            $id_act = $item->id;
            $num_opo13 = $item->num_opo;
            $date_accept = $item->date_accept;
            $info_wort_to_accept = $item->info_wort_to_accept;
            $fam_wort_to_accept = $item->fam_wort_to_accept;
            $name_wort_to_accept = $item->name_wort_to_accept;
            $otch_wort_to_accept = $item->otch_wort_to_accept;

            $contents = $contents."<record id=\"$id_act\">\n";
            $contents = $contents . "<num_opo>$num_opo13</num_opo>\n";
            $contents = $contents . "<date_accept>$date_accept</date_accept>\n";
            $contents = $contents . "<info_wort_to_accept>$info_wort_to_accept</info_wort_to_accept>\n";
            $contents = $contents . "<fam_wort_to_accept>$fam_wort_to_accept</fam_wort_to_accept>\n";
            $contents = $contents . "<name_wort_to_accept>$name_wort_to_accept</name_wort_to_accept>\n";
            $contents = $contents . "<otch_wort_to_accept>$otch_wort_to_accept</otch_wort_to_accept>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</act_reason_accident>\n";
        $contents = $contents."</info_accident>\n";

        //раздел 8
        $contents = $contents."<info_ready>\n";
        //раздел 8.1
        $contents = $contents."<info_respons_worker>\n";
        $info_respons_worker = Info_respons_worker::orderBy('id')->get();
        foreach ($info_respons_worker as $item) {
            $id_resp = $item->id;
            $num_opo14 = $item->num_opo;
            $fam = $item->fam;
            $name = $item->name;
            $otch = $item->otch;
            $education = $item->education;
            $experiens = $item->experiens;
            $check_resurs = $item->check_resurs;
            $check_system_monitoring = $item->check_system_monitoring;

            $contents = $contents."<record id=\"$id_resp\">\n";
            $contents = $contents . "<num_opo>$num_opo14</num_opo>\n";
            $contents = $contents . "<fam>$fam</fam>\n";
            $contents = $contents . "<name>$name</name>\n";
            $contents = $contents . "<otch>$otch</otch>\n";
            $contents = $contents . "<education>$education</education>\n";
            $contents = $contents . "<experiens>$experiens</experiens>\n";
            $contents = $contents . "<check_resurs>$check_resurs</check_resurs>\n";
            $contents = $contents . "<check_system_monitoring>$check_system_monitoring</check_system_monitoring>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</info_respons_worker>\n";

        //раздел 8.2
        $contents = $contents."<pmla>\n";
        $pmla = \App\Models\Rtn2\Pmla::orderBy('id')->get();
        foreach ($pmla as $item) {
            $id_pmla = $item->id;
            $num_opo15 = $item->num_opo;
            $date_accept1 = $item->date_accept;
            $time1 = $item->time;
            $name_service = $item->name_service;
            $time_evidence = $item->time_evidence;
            $info_other_service = $item->otch_wort_to_accept;
            $pmla_copy = $item->pmla_copy;

            $contents = $contents."<record id=\"$id_pmla\">\n";
            $contents = $contents . "<num_opo>$num_opo15</num_opo>\n";
            $contents = $contents . "<date_accept>$date_accept1</date_accept>\n";
            $contents = $contents . "<time>$time1</time>\n";
            $contents = $contents . "<name_service>$name_service</name_service>\n";
            $contents = $contents . "<time_evidence>$time_evidence</time_evidence>\n";
            $contents = $contents . "<info_other_service>$info_other_service</info_other_service>\n";
            $contents = $contents . "<pmla_copy>$pmla_copy</pmla_copy>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</pmla>\n";

        //раздел 8.3
        $contents = $contents."<planing>\n";
        $planing = Planing::orderBy('id')->get();
        foreach ($planing as $item) {
            $id_planing = $item->id;
            $num_opo16 = $item->num_opo;
            $info_event = $item->info_event;
            $file_info = $item->file_info;
            $check_agreement = $item->check_agreement;
            $date_agreement = $item->date_agreement;
            $nym_agreement = $item->nym_agreement;
            $date_end_agreement = $item->date_end_agreement;
            $isp_agreement = $item->isp_agreement;

            $contents = $contents."<record id=\"$id_planing\">\n";
            $contents = $contents . "<num_opo>$num_opo16</num_opo>\n";
            $contents = $contents . "<info_event>$info_event</info_event>\n";
            $contents = $contents . "<file_info>$file_info</file_info>\n";
            $contents = $contents . "<check_agreement>$check_agreement</check_agreement>\n";
            $contents = $contents . "<date_agreement>$date_agreement</date_agreement>\n";
            $contents = $contents . "<nym_agreement>$nym_agreement</nym_agreement>\n";
            $contents = $contents . "<date_end_agreement>$date_end_agreement</date_end_agreement>\n";
            $contents = $contents . "<isp_agreement>$isp_agreement</isp_agreement>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</planing>\n";

        //раздел 8.4
        $contents = $contents."<mark_ready>\n";
        $mark_ready = Mark_ready::orderBy('id')->get();
        foreach ($mark_ready as $item) {
            $id_mark = $item->id;
            $num_opo17 = $item->num_opo;
            $kol_vo_worker = $item->kol_vo_worker;
            $result_ready = $item->result_ready;
            $comment = $item->comment;

            $contents = $contents."<record id=\"$id_mark\">\n";
            $contents = $contents . "<num_opo>$num_opo17</num_opo>\n";
            $contents = $contents . "<kol_vo_worker>$kol_vo_worker</kol_vo_worker>\n";
            $contents = $contents . "<result_ready>$result_ready</result_ready>\n";
            $contents = $contents . "<comment>$comment</comment>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</mark_ready>\n";
        $contents = $contents."</info_ready>\n";

        //раздел 9
        $contents = $contents."<planing_event_pb>\n";

        $plan_event = Plan_event::orderBy('id')->get();
        $contents = $contents."<plan_event>\n";

        foreach ($plan_event as $item) {
            $id_plan_event = $item->id;
            $num_opo18 = $item->num_opo;
            $name_event1 = $item->name_event;
            $time2 = $item->time;

            $contents = $contents."<record id=\"$id_plan_event\">\n";
            $contents = $contents . "<num_opo>$num_opo18</num_opo>\n";
            $contents = $contents . "<name_event>$name_event1</name_event>\n";
            $contents = $contents . "<time>$time2</time>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</plan_event>\n";
        $contents = $contents."</planing_event_pb>\n";

        //раздел 10
        $signed_data = Signed_data::orderBy('id')->get();
        $contents = $contents."<signed_data>\n";

        foreach ($signed_data as $item) {
            $id_sign = $item->id;
            $fam = $item->fam;
            $name1 = $item->name;
            $otch1 = $item->otch;
            $position = $item->position;
            $sign = $item->sign;

            $contents = $contents."<record id=\"$id_sign\">\n";
            $contents = $contents . "<fam>$fam</fam>\n";
            $contents = $contents . "<name>$name1</name>\n";
            $contents = $contents . "<time>$otch1</time>\n";
            $contents = $contents . "<position>$position</position>\n";
            $contents = $contents . "<sign>$sign</sign>\n";
            $contents = $contents."</record>\n";
        }
        $contents = $contents."</signed_data>\n";

        Storage::disk('local')->put('year.xml', $contents, 'public');
    }
}
