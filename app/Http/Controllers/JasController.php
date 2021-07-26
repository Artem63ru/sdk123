<?php

namespace App\Http\Controllers;

use App\Jas;
use App\Ref_opo;
use Illuminate\Http\Request;

class JasController extends Controller
{
    public function showJas()
    {
        return view('web.jas.index', ['jas' => Jas::orderByDesc('data')->sortable('date')->paginate(20), 'opo' => Ref_opo::orderBy('idOPO')->get(), 'id'=>'1']);
    }
}
