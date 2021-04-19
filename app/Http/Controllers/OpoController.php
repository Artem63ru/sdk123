<?php

namespace App\Http\Controllers;


use App\Ref_opo;
use App\Models\Calc_opo;
use App\Models\Calc_elem;
use App\Models\ref_oto;
use App\Ref_obj;
use App\User;
use App\Jas;
use Illuminate\Http\Request;


class OpoController extends Controller
{
    public function view_opo ()
    {
//        $model1 = new Jas();
//     //   $ref_opo1 = new Ref_opo();
//        $model =  $model1->where('from_opo', 1)
//            ->orderBy('data', 'desc')
//            ->take(10)
//            ->get();
//       $ref_opo2 = Ref_opo::all(); // Выведет все записи из БД
//       foreach ($model as $jas1)
//        {
//      echo $jas1->from_opo;
//       //   echo $ref_opo1 = $jas1->opo_to_jas()->from_opo;
//        }
//       foreach ($ref_opo2 as $jas1)
//        {
//      echo $jas1->descOPO;
//          echo  $jas1->opo_to_jas()->from_opo;
//        }

    $jas = Jas::find(200);
    $jas1 = Ref_opo::find(1)->opo_to_jas;
        echo $jas->jas_to_opo->descOPO;
        echo '<BR>';
        echo $jas->jas_to_elem->nameObj;
        echo '<BR>';
        echo $jas->danger;
        echo '<BR>';

        $jas11 = Jas::take(10)->get();
        foreach ( $jas11 as $jas10)
        {
            echo '/////////////*************///////////<BR>';
            echo $jas10->status;
      echo '<BR>';
      echo $jas10->jas_to_opo->descOPO;
      echo $jas10->jas_to_elem->nameObj;
     //     echo  $jas1->opo_to_jas()->from_opo;
        }

  return view('ref_opo', compact('jas', 'jas11'));
    }
    public static function id_opo_from_name($opo)
//       ********************** Определение Ид по имени ОПО*****************************
    // *************************  Вывод всех данных по ОПО *************************
    {
        $result = Ref_opo::all()->where('descOPO',$opo)->first();

          //  $ip_opo =  $result->idOPO;

        return $result;
    }
    public static function id_elem_from_name($elem)
//       ********************** Определение Ид по имени Елемента*****************************
    // *************************  Вывод всех данных по Элементу *************************
    {
        $result = Ref_obj::all()->where('nameObj',$elem)->last();

          //  $ip_opo =  $result->idOPO;
//        echo $result->elem_to_calc->take(-1)->first()->op_m;
//        foreach ($result->elem_to_calc->take(-1) as $row ) {
//            echo $row->ip_elem;
//        }
        return $result;
    }
    public static function ip_elem($id_elem)
//       ********************** Вывод последних расчетных данных по элементу*****************************
    // *************************  Вывод всех данных по Элементу *************************
    {
        $ip_elem = Calc_elem::where('from_elem',$id_elem)
            ->orderBy('id', 'desc')
            ->take(1)
        ->first();

       return $ip_elem;
    }
    public static function calc_elem($id_elem)
//       ********************** Вывод последних расчетных 20 данных по элементу*****************************

    {
//        $ip_elem = Calc_elem::where('from_elem',$id_elem)
//           ->orderBy('id', 'desc')
//           ->take(30)->get();
//       $ip_elem1 = collect($ip_elem);
   //     $ip_elem = Ref_obj::find($id_elem)->elem_to_calc->take(30);
//        $my = array();
        foreach (Ref_obj::find($id_elem)->elem_to_calc->take(40) as $row)
        {
            $my[] =array (strtotime($row->date)*1000, $row->op_m);

        }
//        $result_data = str_replace('"','',json_encode(array_reverse($my, false)));
        return str_replace('"','',json_encode(array_reverse($my, false)));
    }
    public static function ip_opo($id_opo)
//       ********************** Определение ИП ОПО по имени ИД*****************************
    {
        $result = Calc_opo::all()->last();
        if ($id_opo == 1) {
             $ip_opo_r = $result->ip_opo_1;

            return $ip_opo_r;
        }
         if ($id_opo == 2) {
             $ip_opo_r = $result->ip_opo_2;

            return $ip_opo_r;
        }
         if ($id_opo == 3) {
             $ip_opo_r = $result->ip_opo_3;

            return $ip_opo_r;
        }
       if ($id_opo == 4) {
             $ip_opo_r = $result->ip_opo_4;

            return $ip_opo_r;
        }
         if ($id_opo == 5) {
             $ip_opo_r = $result->ip_opo_5;

            return $ip_opo_r;
        }
         if ($id_opo == 6) {
             $ip_opo_r = $result->ip_opo_6;

            return $ip_opo_r;
        }
       if ($id_opo == 7) {
             $ip_opo_r = $result->ip_opo_7;

            return $ip_opo_r;
        }
         if ($id_opo == 8) {
             $ip_opo_r = $result->ip_opo_8;

            return $ip_opo_r;
        }
         if ($id_opo == 9 )
         {
             $ip_opo_r = $result->ip_opo_9;

            return $ip_opo_r;
        }



    }

}
