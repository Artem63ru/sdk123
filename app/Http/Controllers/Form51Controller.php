<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;

use App\Models\Reports\Form51;
use Illuminate\Http\Request;

class Form51Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Form51::orderBy('id','DESC')->paginate(10);
        return view('form51.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form51.create');
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
        $report51 = Form51::create($input);
        AdminController::log_record('Создал оперативное сообщений о инциденте форма 5.1');//пишем в журнал
        return redirect()->route('form51.index')
            ->with('success','User created successfully');
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
        $data = Form51::find($id);
        AdminController::log_record('Открыл для редактирования оперативное сообщений о инциденте форма 5.1');//пишем в журнал
        return view('form51.edit',compact('data'));
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
        $data = Form51::find($id);
        $data->update($input);
        AdminController::log_record('Сохранил после редактирования оперативное сообщений о инциденте форма 5.1');//пишем в журнал
        return redirect()->route('form51.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Form51::find($id)->delete();
        AdminController::log_record('Удалил оперативное сообщений о инциденте форма 5.1');//пишем в журнал
        return redirect()->route('form51.index')
            ->with('success','User deleted successfully');
    }
}
