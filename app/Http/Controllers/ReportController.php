<?php

namespace App\Http\Controllers;

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

class ReportController extends Controller
{
    public function report()
    {
        return view('web.docs.reports.form_8', ['rows'=>Ref_obj::where('InUse','=','1')->orderby('idObj')->get()]);
    }

    public function report1()
    {
        return view('web.docs.reports.scena_report', ['rows1'=>Jas::orderby('id')->get()]);
    }

    public function report2()
    {
        return view('web.docs.reports.result_pk', ['rows2'=>Data_check_out::orderby('id')->get()]);
    }

    public function report3()
    {
        return view('web.docs.reports.violations_report', ['rows3'=>Data_check_out::orderby('id')->get()]);
    }

    public function report4()
    {
        foreach (Ref_opo::orderby('idOPO')->get() as $rows1) {
            $name_opos = $rows1->descOPO;
echo $name_opos.'<br>';
            foreach ($rows1->opo_to_calc_day_min as $rows2) {
                $ip_opos = $rows2->ip_opo;
echo $ip_opos.'<br>';
            }

            foreach ($rows1->opo_to_obj as $item) {
//                $ip = 1;
                $name = $item->nameObj;
echo $name.'<br>';
                foreach ($item->elem_to_calc_in_date as $item2) {
                    $ip = $item2->ip_elem;
                    if ($item2->ip_elem < $ip) {
                        $ip = $item2->ip_elem;
                    }
                    $ip_elem_min = 1;
                    if ($ip < $ip_elem_min) {
                        $ip_elem_min = $ip;
                        echo $ip_elem_min.'<br>';;
                    }
                }
            }
//            $new_item = [];
//            $new_item['name_opo'] = $name_opos;
//            $new_item['IP_OPO'] = $ip_opos;
//            $new_item['IP_ELEM'] = $ip_elem_min;
//            $new_item['name_elem'] = $name;
//            $ip_elementov[] = $new_item;
//        echo $name_opos.'<br>';
//            echo $ip_opos.'<br>';
//            echo $name.'<br>';
//            echo $ip_elem_min.'<br>';
        }
        return view('web.docs.reports.status_opo', ['data' => $ip_elementov]);
    }


    public function report5()
    {
        return view('web.docs.reports.repiat_report', ['rows5'=>Data_check_out::orderby('id')->get()]);
    }

    public function report6()
    {
        return view('web.docs.reports.event_pk', ['rows6'=>Data_check_out::orderby('id')->get()]);
    }

}
