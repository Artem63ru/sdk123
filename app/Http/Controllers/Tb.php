<?php

namespace App\Http\Controllers;

use App\Models\Ref_oto;
use App\Models\Ref_obj;
use App\Ref_opo;
use App\Models\Ref_shema;
use Illuminate\Http\Request;

class Tb extends Controller
{
    public function view_elem_tb($id_opo, $id_obj, $id_tb)
    {
        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        $ver_opo =  Ref_opo::find($id_opo);  // Ссылка на ОПО
        $all_opo = Ref_opo::all(); //Сыслка на все ОПО
        $elems_opo = $ver_opo->opo_to_obj; // Перечень всех элементов ОПО
        $Obj = Ref_obj::find($id_obj); //Ссылка на элемент ОПО выбраный
        $this_oto = Ref_oto::find($id_tb);
        $image = \Storage::URL($this_oto->image);

        $this_elem = $Obj->elem_to_tu->where('from_type_obor', '=', $id_tb);  // перечень элементов ТУ входящих в состав ТБ
        $this_elem_apk = $Obj->elem_to_APK->where('idOTO', '=', $id_tb);  // перечень элементов ТУ входящих в состав ТБ
        $this_calc_tb = $Obj->elem_to_calc_tb->where('from_oto', '=', $id_tb)->first();

        if ($Obj->QP1_TYPE == 1 && $Obj->type_project == "W"){
        $type = 1;
    }
        elseif ($Obj->QP1_TYPE == 2 && $Obj->type_project == "W"){
            $type = 2;
    }
        elseif ($Obj->QP1_TYPE == 1 && $Obj->type_project == "W1"){
            $type = 3;
    }
        elseif ($Obj->QP1_TYPE == 2 && $Obj->type_project == "W1"){
        $type = 2;
    }
        else
            $type = 0;
        $pdf_null = Ref_shema::where([['from_OTO', '=', 0],['type_project', '=', 1]])->first()->file_name;
        if(isset(Ref_shema::where([['from_OTO', '=', $id_tb],['type_project', '=', $type]])->first()->file_name)) {
            $pdf = Ref_shema::where([['from_OTO', '=', $id_tb],['type_project', '=', $type]])->first()->file_name;
            $shema = \Storage::URL($pdf);
        }
        else
            $shema = \Storage::URL($pdf_null);

        $name_tb = $this_oto->descOTO;

       return view('web.tb', compact('jas', 'ver_opo', 'elems_opo', 'this_elem', 'id_obj', 'this_elem_apk', 'all_opo', 'this_calc_tb', 'image', 'shema', 'name_tb', 'id_tb'));
    }

}
