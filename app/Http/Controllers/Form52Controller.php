<?php

namespace App\Http\Controllers;


use App\Models\Reports\Form52;
use App\Models\Reports\Form52_table;
use Illuminate\Http\Request;

class Form52Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Form52::orderBy('id','DESC')->paginate(15);
        return view('form52.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Form52::create();
        return view('form52.edit',compact('data'), ['rows'=>Form52_table::orderby('id_event')->where('id_act', '=', $data->id_event)->get()]);
       // $act_id = 0;
    //    return view('form52.create', ['rows'=>Form52_table::orderby('id_event')->where('id_act', '=', "0")->get()]);
    }

    // открытие формы заполнения мероприятия
    public function create_table()
    {

        return view('form52.create_table');
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
        $report52 = Form52::create($input);
        foreach (Form52_table::where('id_act', '=', "0")->get() as $item)
        {
           $item->id_act = $report52->id;
            $item->save();
        }
        return redirect()->route('form52.index')
            ->with('success','User created successfully');
    }

    public function store_table(Request $request)
    {
        $input_data = $request->all();
        $report52_table = Form52_table::create($request->all());
        $data = Form52::find(23);
//        return view('form52.edit',compact('data'), ['rows'=>Form52_table::orderby('id_act')->where('id_act', '=', $data->id_event)->get()]);
  //  return redirect()->route('form52.edit',['form52'=>$data->id_event]);
       //return back()->withInput();
        return redirect()->action([Form52Controller::class, 'edit'], ['form52' => $data->id_event]);
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
        $data = Form52::find($id);
        return view('form52.edit',compact('data'), ['rows'=>Form52_table::orderby('id_act')->where('id_act', '=', $id)->get()]);
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
           $data = Form52::find($id);
           $data->update($input);
           return redirect()->route('form52.index')
               ->with('success', 'User updated successfully');
       }

       elseif($_POST['save']== 'Update_childtablle')
       {
           $input = $request->all();
           $data = Form52::find($id);
           $data->update($input);
           return redirect()->route('add-child-form52',['id'=>$id]);
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
        Form52::find($id)->delete();
        return redirect()->route('form52.index')
            ->with('success','User deleted successfully');
    }
}
