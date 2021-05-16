<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatrixControllers extends Controller
{
    //******************* Обзор справочника возможных событий ****************************
    public function showEvent()
    {
        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        return view('web.docs.matrix.events.index', compact('jas'));
    }
    //******************* Обзор коэффициентов для расчетов ****************************
    public function showkoef()
    {
        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        return view('web.docs.koef.index', compact('jas'));
    }
}
