<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Operational_safety;
use App\Ref_opo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationalSafetyController extends Controller
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
        $oper_safety = Operational_safety::create($input);
        return redirect("/opo/".$id."/main");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_row)
    {
        $data = Operational_safety::find($id_row);
        $ver_opo =  Ref_opo::find($data->from_opo);
        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
        return view('operational.show',compact('data', 'all_opo', 'ver_opo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_row)
    {
        $data = Operational_safety::find($id_row);
        $ver_opo =  Ref_opo::find($data->from_opo);
        $all_opo = Ref_opo::all(); //Сыслка на все ОПО для панели
        return view('operational.edit',compact('data', 'all_opo', 'ver_opo'));
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
        $data = Operational_safety::find($id);
        $data->update($input);
        return redirect("/opo/".$data->from_opo."/main");
    }
//"/opo/".$data->from_opo."/main"
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_row)
    {
        $data = Operational_safety::find($id_row);
        Operational_safety::find($id_row)->delete();
        return redirect("/opo/".$data->from_opo."/main");
    }

    public function get_params($id) {
        $data_all = Operational_safety::where('from_opo', $id)->get();
        foreach ($data_all as $row) {
            if ($row['year']==2021) {
                            if ($row['o_pk']) {
                    $data[] = $row['o_pk'];
                }
                else {
                    $data[]=0;
                }
            }
        }

        return $data;
    }
    public function get_params_rab($id) {
        $data_all = Operational_safety::where('from_opo', $id)->get();
        foreach ($data_all as $row) {
            if ($row['year']==2021) {
                if ($row['r_ab']) {
                    $data[] = $row['r_ab'];
                }
                else {
                    $data[]=0;
                }
            }
        }
        return $data;
    }
    public function get_params_rbf($id) {
        $data_all = Operational_safety::where('from_opo', $id)->get();
        foreach ($data_all as $row) {
            if ($row['year']==2021) {
                if ($row['r_bf']) {
                    $data[] = $row['r_bf'];
                }
                else {
                    $data[]=0;
                }
            }
        }
        return $data;
    }
    public function get_params_rgo($id) {
        $data_all = Operational_safety::where('from_opo', $id)->get();
        foreach ($data_all as $row) {
            if ($row['year']==2021) {
                if ($row['r_go']) {
                    $data[] = $row['r_go'];
                }
                else {
                    $data[]=0;
                }
            }
        }
        return $data;
    }
}
