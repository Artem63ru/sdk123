<?php

namespace App\Http\Controllers;


use App\Models\Reports\Form62;
use Illuminate\Http\Request;

class Form62Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        AdminController::log_record('Открыл список актов технического расследования причин аварии форма 6.2');//пишем в журнал
        $data = Form62::orderBy('id','DESC')->paginate(10);
        return view('form62.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form62.create');
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
        $report62 = Form62::create($input);
        AdminController::log_record('Создал акт технического расследования причин аварии форма 6.2');
        return redirect()->route('form62.index');
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
        $data = Form62::find($id);
        AdminController::log_record('Открыл для редактирования акт технического расследования причин аварии форма 6.2');
        return view('form62.edit',compact('data'));
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
        $data = Form62::find($id);
        $data->update($input);
        AdminController::log_record('Сохранил после редактирования акт технического расследования причин аварии форма 6.2');
        return redirect()->route('form62.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Form62::find($id)->delete();
        AdminController::log_record('Удалил акт технического расследования причин аварии форма 6.2');
        return redirect()->route('form62.index');
    }
}
