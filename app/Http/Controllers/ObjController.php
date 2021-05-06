<?php

namespace App\Http\Controllers;

use App\Models\Ref_obj;
use App\Ref_opo;
use App\Models\Tech_reg\Tech_reglament;
use Illuminate\Http\Request;

class ObjController extends Controller
{
    public function view_elem_main ($id_opo, $id_obj)
//       ********************** Вывести схему на страницу Конкретного ОПО по ИД *****************************
    {

        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        $ver_opo =  Ref_opo::find($id_opo);  // Ссылка на ОПО
        $all_opo = Ref_opo::all(); //Сыслка на все ОПО
        $elems_opo = $ver_opo->opo_to_obj; // Перечень всех лементов ОПО
        $this_elem = Ref_obj::find($id_obj); // Ссылка на элемен
        $this_elem_apk = Ref_obj::find($id_obj)->elem_to_APK;  // перечень всех несоответствий АПК по элементу
        $reglaments = Tech_reglament::all()->where('idObj', '==', $this_elem->typeObj);
//
        return view('web.elem_main', compact('jas', 'ver_opo', 'elems_opo', 'this_elem', 'id_obj', 'this_elem_apk', 'all_opo', 'reglaments'));

    }
    //*************************  Вывод для графика 40 значений ip_elem   *************************************
    public function calc_elem_all ( $id_obj)
    {

        foreach (Ref_obj::find($id_obj)->elem_to_calc_40 as $row)
        {
            $my[] =array (strtotime($row->date)*1000, $row->ip_elem);

        }
//        $result_data = str_replace('"','',json_encode(array_reverse($my, false)));
        return str_replace('"','',json_encode(array_reverse($my, false)));
        //return Ref_obj::find($id_obj)->elem_to_calc_40;
    }
}
