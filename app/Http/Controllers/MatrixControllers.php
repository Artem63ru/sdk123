<?php

namespace App\Http\Controllers;

use App\Models\Rtn;
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
    //******************** Обзор Регламентных значений ****************************
    public function Showregl()
    {
        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        return view('web.docs.reglament.index', compact('jas'));

    }
    //******************** Обзор отчета РТН ****************************
    public function Showrtn()
    {
        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        return view('web.docs.rtn.index', compact('jas'));

    }
    //******************** Обзор сценариев ****************************
    public function Showmatrix()
    {
        $jas = OpoController::view_jas_15();     // Жас всех ОПО 15 записей
        return view('web.docs.matrix.scenar.index', compact('jas'));

    }

    //******************** Обзор предписаний РТН ****************************
    public function show_RTN_all()
    {
        $data = Rtn::orderByDesc('id')->get();
        return view('web.docs.matrix.predRTN.index', compact('data'));
    }
    public function edit_RTN($id)
    {
        $data = Rtn::find($id);
        return view('web.docs.matrix.predRTN.edit',compact('data'));
    }
    public function update_RTN(Request $request, $id)
    {
        $input = $request->all();
        $data = Rtn::find($id);
        $data->update($input);
        return redirect("/docs/predRTN");
    }
    public function show_RTN($id)
    {
        $data = Rtn::find($id);
        return view('web.docs.matrix.predRTN.show',compact('data'));
    }
    public function create_RTN()
    {
        return view('web.docs.matrix.predRTN.create');
    }
    public function store_RTN(Request $request)
    {
        $input = $request->all();
        $predRTN = Rtn::create($input);
        return redirect('/docs/predRTN');
    }
    public function delete_RTN($id)
    {
        Rtn::find($id)->delete();
        return redirect('/docs/predRTN');
    }
}
