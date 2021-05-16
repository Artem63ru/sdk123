<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatrixControllers extends Controller
{
    public function showEvent()
    {
        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        return view('web.docs.matrix.events.index', compact('jas'));
    }
}
