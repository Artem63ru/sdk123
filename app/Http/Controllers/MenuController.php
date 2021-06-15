<?php

namespace App\Http\Controllers;

use App\Ref_opo;
use Illuminate\Http\Request;
use DB;

class MenuController extends Controller
{
   public function view_menu ()
   {
       $v_menu = Ref_opo::orderBy('idOPO')->get();
       return view('web.gda', ['name' => $v_menu]);
   }
}
