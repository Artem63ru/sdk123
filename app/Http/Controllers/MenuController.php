<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MenuController extends Controller
{
   public function view_menu ()
   {
       $v_menu = DB::select('select * from ref_opo');
//       $user = DB::table('ref_opo')->where('idOPO', 1)->first();
//       echo $user->descOPO;
//       dd($v_menu);
//       foreach ($v_menu) {
//           echo $descOPO->text;
//       }
      return view('web.gda', ['name' => $v_menu]);
   }
}
