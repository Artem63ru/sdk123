<?php

namespace App\Http\Controllers;

use App\Models\Reports\Form61;
use Illuminate\Http\Request;

class Form61Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        AdminController::log_record('Открыл список ОС об аварииях, случаях утраты взрывчатых материалов промышленного назначения форма 6.1');//пишем в журнал
        $data = Form61::orderBy('id','DESC')->paginate(10);
        return view('form61.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form61.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $report61 = Form61::create($input);
        AdminController::log_record('Создал ОС об аварииях, случаях утраты взрывчатых материалов промышленного назначения форма 6.1');
        return redirect()->route('form61.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Form61::find($id);
        AdminController::log_record('Открыл для редактирования ОС об аварииях, случаях утраты взрывчатых материалов промышленного назначения форма 6.1');
        return view('form61.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Form61::find($id);
        $data->update($input);
        AdminController::log_record('Сохранил после изменения ОС об аварииях, случаях утраты взрывчатых материалов промышленного назначения форма 6.1');
        return redirect()->route('form61.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Form61::find($id)->delete();
        AdminController::log_record('Удалил ОС об аварииях, случаях утраты взрывчатых материалов промышленного назначения форма 6.1');
        return redirect()->route('form61.index');
    }
}
