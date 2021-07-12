<?php

namespace App\Http\Controllers;


use App\Models\Reports\Form5363;
use App\Models\Reports\Form5363_table;
use Illuminate\Http\Request;

class Form5363Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Form5363::orderBy('id','DESC')->paginate(15);
        return view('form5363.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Form5363::create();
        return view('form5363.edit',compact('data'), ['rows'=>Form5363_table::orderby('id_event')->where('id_act', '=', $data->id_event)->get()]);

    }

    // открытие формы заполнения мероприятия
    public function create_table()
    {
        return view('form5363.create_table');
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
        $report5363 = Form5363::create($input);
        foreach (Form5363_table::where('id_act', '=', "0")->get() as $item)
        {
           $item->id_act = $report5363->id;
            $item->save();
        }
        return redirect()->route('form5363.index')
            ->with('success','User created successfully');
    }

    public function store_table(Request $request)
    {
        $input_data = $request->all();
        $report52_table = Form5363_table::create($request->all());
        $data = Form5363::find(23);
//        return view('form52.edit',compact('data'), ['rows'=>Form52_table::orderby('id_act')->where('id_act', '=', $data->id_event)->get()]);
        //  return redirect()->route('form52.edit',['form52'=>$data->id_event]);
        //return back()->withInput();
        return redirect()->action([Form5363Controller::class, 'edit'], ['form5363' => $data->id_event]);
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
        $data = Form5363::find($id);
        return view('form5363.edit',compact('data'), ['rows'=>Form5363_table::orderby('id_act')->where('id_act', '=', $id)->get()]);
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

       if($_POST['save']== 'Update') {
           $input = $request->all();
           $data = Form5363::find($id);
           $data->update($input);
           return redirect()->route('form5363.index')
               ->with('success', 'User updated successfully');
       }
       elseif($_POST['save']== 'Update_childtablle')
       {
           $input = $request->all();
           $data = Form5363::find($id);
           $data->update($input);
           return redirect()->route('add-child-form5363',['id'=>$id]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Form5363::find($id)->delete();
        return redirect()->route('form5363.index')
            ->with('success','User deleted successfully');
    }

}
