<?php

namespace App\Http\Controllers;

use App\Ref_opo;
use App\Models\Calc_ip_opo_i;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Opo_day;

class Opo_dayController extends Controller
{
    public static function view_day ($id)
    {

      $result = Opo_day::all();

//        echo json_encode($result);
//        $result = json_encode($result);
//        echo '<BR>';
//        echo '<BR>';
//        echo '<BR>';
      $my = array();
      $data1 = array();
      $id_opo = $id;

      if($result->Count() < 1)
        {
            echo "Не найдено";
        }
        else
        {
            foreach ($result as $row)
            {
                $my[] = $row->toArray('ip_opo_2');
            }
            $result_ip = str_replace('"','',json_encode($my));
            foreach ($result as $row)
            {
                $data1[] = array (strtotime($row->date)*1000, $row['ip_opo_'.$id_opo]);
            }
        }
        $result_data = str_replace('"','',json_encode(array_reverse($data1, false)));
//          $result_data = json_encode($data1);

        echo $result_data;
//
   //   return view('opo_day', compact('result_ip', 'result_data'));
    }
    public static function view_one ()
    {
        $result = Opo_day::all();
        foreach ($result as $row)
        {
            $my = $row->ip_opo_1;
        }
        return $my;
    }
    public static function view_last ()
    {

         $opos = Ref_opo::find(1)->opo_to_calc_months_min->first();//->orderby('ip_opo', 'asc')->take(1)->get();

//            foreach ($opos as $opo)
//            {
              echo   $opos->ip_opo ;
      //      echo $calc_opo = Calc_ip_opo_i::find($opos['id']);
//           //    echo   $calc_opo->calc_to_status->status;
             echo   $opos->calc_to_status->status;
              echo   $opos->calc_to_status->color;
//          //    echo   date('d-m-Y h:m', strtotime($opo->date));
//
//              echo '<BR>';
//            }
//




   //     return $opos;//->opo_to_calc_day('2021-02-20') ;//->first()->date;
          //  return $my;//$opos->opo_to_calc30;//->first()->date;
    }


}
