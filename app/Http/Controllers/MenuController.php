<?php

namespace App\Http\Controllers;

use App\Models\Logs_safety;
use App\Ref_opo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class MenuController extends Controller
{
   public function view_menu ()
   {
       $time_password = Logs_safety::first()->time_password; //время действия пароля
       $date_last_update_password = User::orderByDesc('id')->first()->date_new_password;
       $date_next_update_password = Carbon::createFromDate($date_last_update_password)->addDays($time_password);
$check_date_password = 0;
       if($date_next_update_password < date('Y-m-d')){
           $check_date_password = 1;
       }
       else{
           $check_date_password = 0;
       }



       $v_menu = Ref_opo::orderBy('idOPO')->get();
       return view('web.gda', ['name' => $v_menu], compact('check_date_password'));
   }
}
