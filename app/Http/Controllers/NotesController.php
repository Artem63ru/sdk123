<?php

namespace App\Http\Controllers;

use App\OPO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\AddLogs;
use Event;
use Redirect;
use PDF;

class NotesController extends Controller
{

    public function index()
    {
        $data['opos'] = OPO::paginate(10);

        return view('opos',$data);
    }

    public function pdf(){

        $data['title'] = 'Notes List';
        $data['opos'] =  OPO::get();
        $patch = 'tuts_opos.pdf';
        event(new AddLogs(Auth::user()->name, $patch));
       // Event::fire(new AddLogs(Auth::user()->name));
        $pdf = PDF::loadView('opos_pdf', $data);

        return $pdf->download($patch);
    }


}
