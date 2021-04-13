<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opo_day;

class Opo_dayController extends Controller
{
    public static function view_day ()
    {

      $result = Opo_day::all();

//        echo json_encode($result);
//        $result = json_encode($result);
//        echo '<BR>';
//        echo '<BR>';
//        echo '<BR>';
      $my = array();
      $data1 = array();

      if($result->Count() < 1)
        {
            echo "Не найдено";
        }
        else
        {
            foreach ($result as $row)
            {
                $my[] = $row->ip_opo_1;
            }
            $result_ip = str_replace('"','',json_encode($my));
            foreach ($result as $row)
            {
                $data1[] = array (strtotime($row->date)*1000, $row->ip_opo_1);
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


}
