<?php

namespace App\Http\Controllers;


use App\Models\Failure_free;
use App\Models\Operational_safety;
use App\Models\Ready;
use App\Models\Rtn;
use App\Ref_opo;
use App\Models\Calc_opo;
use App\Models\Calc_ip_opo_i;
use App\Models\Calc_elem;
use App\Models\ref_oto;
use App\Models\Ref_obj;
use App\User;
use App\Jas;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;



class OpoController extends Controller
{
    public function view_opo ()
    {
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
       return  Ref_opo::all()->where('descOPO',$opo)->first();
    }
    public static function id_elem_from_name($elem)
//       ********************** Определение Ид по имени Елемента*****************************
    // *************************  Вывод всех данных по Элементу *************************
    {
      return Ref_obj::all()->where('nameObj',$elem)->last();
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
    public static function view_jas_15()
//       ********************** Вывести последние 15 событий *****************************
    {
       return Jas::orderBy('id','DESC')->take(15)->get();
    }
     public function view_opo_main()
//       ********************** Вывести данные на страницу *****************************
    {
       $jas = OpoController::view_jas_15();
       $opo = Ref_opo::orderBy('idOPO')->get();
       $id = 2;

       return view('web.index', compact('jas', 'opo', 'id'));
    }
    public function view_opo_id($id)
//       ********************** Вывести данные на страницу Конкретного ОПО по ИД *****************************
    {

       //$jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
       $opo = Ref_opo::orderBy('idOPO')->get();  // Перечень всех ОПО
       $ver_opo =  Ref_opo::find($id);
       $jas_opo =  $ver_opo->opo_to_jas;   //Журнал этого опо последние 60 записей
       $mins_opos = $ver_opo->opo_to_calc_day_min->first();
       $mins_opo_months = $ver_opo->opo_to_calc_months_min->first();
       $mins_opo_year = $ver_opo->opo_to_calc_year_min->first();
       //$data=array('opo'=>$opo, 'id'=>$id, 'jas_opo'=>$jas_opo, 'mins_opos'=>$mins_opos, 'mins_opo_months'=>$mins_opo_months, 'mins_opo_year'=>$mins_opo_year);
       //return json_encode($data, JSON_UNESCAPED_UNICODE);
       return view('web.index', compact('opo', 'id', 'jas_opo', 'ver_opo', 'mins_opos', 'mins_opo_months', 'mins_opo_year'));
    }

    public function get_opo_data($id, $db_count){

        $new_count=Jas::count();
        if ($new_count==$db_count){
            $data=array('new_data'=>false);
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        }else {
            $opo = Ref_opo::orderBy('idOPO')->get();  // Перечень всех ОПО
            $ver_opo = Ref_opo::find($id);
            $jas_opo = $ver_opo->opo_to_jas;   //Журнал этого опо последние 60 записей
            $mins_opos = $ver_opo->opo_to_calc_day_min->first();
            $mins_opo_months = $ver_opo->opo_to_calc_months_min->first();
            $mins_opo_year = $ver_opo->opo_to_calc_year_min->first();
            $ip_opo = $ver_opo->opo_to_calc1->first()->ip_opo;
            $all_opo_ip = array();

            $i = 0;
            foreach ($opo as $value) {
                $all_opo_ip[$i] = $value->opo_to_calc1->first()->ip_opo;
                $i += 1;
            }
            $jas_opo_data[] = array();

            $i = 0;
            foreach ($jas_opo as $value) {
                $jas_opo_data[$i]['date'] = date('d-m-Y h:m', strtotime($value->data));
                $jas_opo_data[$i]['level'] = $value->level;
                $jas_opo_data[$i]['descOPO'] = $value->jas_to_opo->descOPO;
                $jas_opo_data[$i]['nameObj'] = $value->jas_to_elem->nameObj;
                $jas_opo_data[$i]['status'] = $value->status;
                $jas_opo_data[$i]['name'] = $value->name;
                $jas_opo_data[$i]['check'] = $value->check;
                $jas_opo_data[$i]['id'] = $value->id;
                $i += 1;
            }

            //СТандартные исходные данные по статусам для столбовых графиков
            $day_int_status=-1;
            $day_status='Нет данных';
            $day_opos_ip_opo=0.0;
            if ($mins_opos!==null){
                $day_int_status=$mins_opos->status;
                $day_status=$mins_opos->calc_to_status->status;
                $day_opos_ip_opo=$mins_opos->ip_opo;
            }
            $months_int_status=-1;
            $months_status='Нет данных';
            $months_opos_ip_opo=0.0;
            if ($mins_opo_months!==null){
                $months_int_status=$mins_opo_months->status;
                $months_status=$mins_opo_months->calc_to_status->status;
                $months_opos_ip_opo=$mins_opo_months->ip_opo;
            }
            $year_int_status=-1;
            $year_status='Нет данных';
            $year_opos_ip_opo=0.0;
            if ($mins_opo_months!==null){
                $year_int_status=$mins_opo_year->status;
                $year_status=$mins_opo_year->calc_to_status->status;
                $year_opos_ip_opo=$mins_opo_year->ip_opo;
            }


            $data = array('new_data'=>true,
                'opo' => $opo,
                'id' => $id,
                'jas_opo' => $jas_opo_data,
                'mins_opos_int_status' => $day_int_status,
                'mins_opos_status' => $day_status,
                'mins_opos_ip_opo' => $day_opos_ip_opo,
                'mins_opo_months_int_status' => $months_int_status,
                'mins_opo_months_status' => $months_status,
                'mins_opo_months_ip_opo' => $months_opos_ip_opo,
                'mins_opo_year_int_status' => $year_int_status,
                'mins_opo_year_status' => $year_status,
                'mins_opo_year_ip_opo' => $year_opos_ip_opo,
                'ip_opo' => $ip_opo,
                'all_opo_ip' => $all_opo_ip,
                'db_count'=>$new_count
            );
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        }


    }
    public function view_opo_main_shema ($id)
//       ********************** Вывести схему на страницу Конкретного ОПО по ИД *****************************
    {

       $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
       $ver_opo =  Ref_opo::find($id);  // Ссылка на ОПО
       $elems_opo = $ver_opo->opo_to_obj; // Перечень всех лементов ОПО
       $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
       $oper_safety = Operational_safety::where('from_opo',$id)->orderByDesc('id')->get();
       $ready = Ready::orderByDesc('id')->get();
       $failure_free = Failure_free::where('from_opo', $id)->orderByDesc('id')->get();

       //       ********************** для количества предписаний РТН *****************************

        $data_rtn_noncheck = Rtn::where('from_opo', $id)->where('status', '!=', 'true')->get();  //кол-во невыполненных предписаний
        $data_rtn_check = Rtn::where('from_opo', $id)->where('status', 'true')->get();          //кол-во выполненных

        //       ********************** для количества событий ПБ по месяцам *****************************

        for ($i = 0; $i <= 12; $i++) {
            $first_day[$i] =  date("Y-m-01", strtotime("-".$i." month"));     //первые дни месяцев
        }
        for ($i = 1; $i <=12; $i++) {
            $jas_month[$i] = Jas::where('from_opo', $id)->where('data', '>=', $first_day[$i])->where('data', '<', $first_day[$i-1])->get();  //забираем из базы строки по месяцам
            if ($jas_month[$i] == "") {
                $jas_month[$i] = 0;
            }
            $count_month[$i] = count($jas_month[$i]);                              //количество записей за месяц
//            $name_month[$i] = date('M', strtotime($first_day[$i]));          //название месяца англ
            $name_month[$i] = Date::parse($first_day[$i])->format('M');          //название месяца рус

            $data_month[$i][0] = $count_month[$i];
            $data_month[$i][1] = $name_month[$i];
        }
        $jas_all = Jas::all();
        $count_jas = count($jas_all);   //общее кол-во событий

        return view('web.opo_main', compact('jas', 'ver_opo', 'elems_opo', 'all_opo', 'oper_safety', 'id', 'ready', 'failure_free',
           'data_rtn_noncheck', 'data_rtn_check', 'count_jas', 'data_month'));
    }

    public function new($id_opo)
    {
        $ver_opo =  Ref_opo::find($id_opo);
        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
        return view('operational.new', compact('all_opo', 'ver_opo', 'id_opo'));
    }

    public function new_ready($id_opo)
    {
        $ver_opo =  Ref_opo::find($id_opo);
        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
        return view('ready.new', compact('all_opo', 'ver_opo', 'id_opo'));
    }

    public function new_failure_free($id_opo)
    {
        $ver_opo =  Ref_opo::find($id_opo);
        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
        return view('failure_free.new', compact('all_opo', 'ver_opo', 'id_opo'));
    }

////       ********************** Операции с расчетом показателя безопасности ОПО*****************************
//    public function operational_edit($id, $id_row){
//        $data = Operational_safety::find($id_row);
//        $ver_opo =  Ref_opo::find($id);
//        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
//        return view('operational_safety.edit',compact('data', 'ver_opo', 'all_opo'));
//    }
//    public function operational_update(Request $request){
//        $input = $request->all();
//        $id_row = $request->id;
//        $data = Operational_safety::find($id_row);
//        $data->update($input);
//        dd ($request);
//        return redirect()->route('/opo/{id}/main')
//            ->with('success','User updated successfully');
//        $ver_opo =  Ref_opo::find($id);
//        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
//        return view('operational_safety.edit',compact('data', 'ver_opo', 'all_opo'));
//    }


    ///************************* Формирование данных для мини графика **********************************
    public static function view_ip_last ($id)
    {

        $opos = Ref_opo::find($id);
        foreach ($opos->opo_to_calc30 as $ip)
        {
            $data1[] = array (strtotime($ip->date)*1000, $ip['ip_opo']);
        }
        $str = 'неудача';
        if(isset($data1)){

            return str_replace('"', '', json_encode(array_reverse($data1, false)));
        }
        else
            return  $str;//->first()->date;
    }
    public static function view_ip_last_test ($id, $data)
    {

        $opos = Ref_opo::find($id);

            $calcs = Calc_ip_opo_i::where('from_opo', '=', $id)->
//            whereDate('date', '=', '2021-5-27')->
            whereDate('date', '=', $data)->
            get();
            foreach ($calcs as $ip) {
                $data1[] = array(strtotime($ip->date) * 1000, $ip['ip_opo']);
            }
        $str = 'неудача';
        if(isset($data1)){

            return str_replace('"', '', json_encode(array_reverse($data1, false)));
        }
        else
            return  $str;//->first()->date;


    }
    ///************************* Формирование данных для мини графика прогнозного показателя **********************************
    public static function view_ip_pro_last ($id)
    {
//        $data1;
        $opos = Ref_opo::find($id);
        foreach ($opos->opo_to_calc_opo_pro as $ip)
        {
            $data1[] = array (strtotime($ip->date)*1000, $ip['pro_ip_opo']);
        }
        $str = 'неудача';
        if(isset($data1)){

            return str_replace('"', '', json_encode(array_reverse($data1, false)));
        }
        else
            return  $str;//->first()->date;

    }
    ///************************* Формирование данных для графика прогнозного показателя **********************************
    public static function view_ip_pro_date ($id, $data)
    {
//        $data1;
        $opos = Ref_opo::find($id);
        foreach ($opos->opo_to_calc_opo_pro_in_date($data) as $ip)
        {
            $data1[] = array (strtotime($ip->date)*1000, $ip['pro_ip_opo']);
        }
        $str = 'неудача';
        if(isset($data1)){

            return str_replace('"', '', json_encode(array_reverse($data1, false)));
        }
        else
            return  $str;//->first()->date;

    }
    ///************************* Формирование IP_OPO текущего для конкрентного ОПО **********************************
    public static function view_ip_opo ($id)
    {
       // $opos = Ref_opo::find($id);

        return  Ref_opo::find($id)->opo_to_calc1->first()->ip_opo;
    }

    //************************ Отображение ситуационного плана ОПО ФС *************************
    public function Show_FS_Plan()

    {


    }


    public function get_db_info(){
        $jas = OpoController::view_jas_15();
        $data[]=array();

        $i=0;
        foreach ($jas as $value){
            $data[$i]['date']=date('d-m-Y h:m', strtotime($value->data));
            $data[$i]['level']=$value->level;
            $data[$i]['descOPO']=$value->jas_to_opo->descOPO;
            $data[$i]['nameObj']=$value->jas_to_elem->nameObj;
            $data[$i]['status']=$value->status;
            $data[$i]['name']=$value->name;
            $data[$i]['check']=$value->check;
            $data[$i]['id']=$value->id;
            $i+=1;
        }

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function get_sum()
    {
        return json_encode(Jas::count());
    }

    public function set_check(Request $request){

        $post = $request->all();
        $res=Jas::updated_check($post['id']);
        if ($res) {
            return json_encode(array('result'=>'true'));
        }
        else{
            $res=array('result'=>'false', 'error'=>$res);
            return json_encode($res);
        }

        //return json_encode(array('result'=>'true'));

    }

}
