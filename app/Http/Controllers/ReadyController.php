<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Operational_safety;
use App\Models\Ready;
use App\Ref_opo;
use Illuminate\Http\Request;

class ReadyController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function new($id)
//    {
//        $ver_opo =  Ref_opo::find($id);
//        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
//        return view('operational.new', compact('all_opo', 'ver_opo'));
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $id = $input['from_opo'];
        $oper_safety = Ready::create($input);
        return redirect("/opo/".$id."/main");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id_row)
    {
        $input = $request->all();
        $id_opo = $input['from_opo'];
        $data = Ready::find($id_row);
        $ver_opo =  Ref_opo::find($id_opo);
        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
        return view('ready.show',compact('data', 'all_opo', 'ver_opo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id_row)
    {
        $input = $request->all();
        $id_opo = $input["from_opo"];
        $data = Ready::find($id_row);
        $ver_opo =  Ref_opo::find($id_opo);
        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
        return view('ready.edit',compact('data', 'all_opo', 'ver_opo'));
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
        $id_opo = $input['from_opo'];
        $data = Ready::find($id);
        $data->update($input);
        return redirect("/opo/".$id_opo."/main");
    }
//"/opo/".$data->from_opo."/main"
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_row)
    {
        $input = $request->all();
        $id_opo = $input["from_opo"];
        $data = Ready::find($id_row);
        Ready::find($id_row)->delete();
        return redirect("/opo/".$id_opo."/main");
    }
}
