<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Glossary\Table_class;

class GlossaryControllers extends Controller
{
    public function showHelp ()
//       ********************** Вывести схему на страницу Конкретного ОПО по ИД *****************************
    {

        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        $events = Table_class::orderBy('id')->get();
        return view('web.glossary.index', compact('jas', 'events' ));

    }
}
