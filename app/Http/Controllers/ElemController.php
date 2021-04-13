<?php

namespace App\Http\Controllers;

use App\Models\Calc_elem;
use App\Ref_Obj;
use App\Models\ref_oto;

class ElemController extends Controller
{
    public static function view_oto ($id_obj)
        //  Вывод ОТО относящихся к элементу //////////////////////****************************
    {
        $elem1 = Ref_Obj::find($id_obj);
        $elem = $id_obj;
        foreach ($elem1->elem_to_oto as $oto1) {
           $oto = $oto1->idOTO;
            echo '<BR>';
            echo '<button class="OPO_nav" onclick="window.location.href =\'/element/'.$elem.'/oto/'.$oto.'\'; " >';
            echo $oto2 = $oto1->descOTO;
            echo '</button>';

        }
    }
    public static function view_tu ($elem_id, $oto)
    // Вывод ТУ относящихся к конкрентному ото элемента
    {
      $elem1 = Ref_Obj::find($elem_id);
        return $elem1;
    }
}
