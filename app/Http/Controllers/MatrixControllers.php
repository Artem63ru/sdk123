<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Rtn\ActionPlan;
use App\Models\CalendarEvents\CalendarEventType;
use App\Models\Ref_obj;
use App\Models\Ref_oto;
use App\Models\Rtn;
use App\Models\Status_obj;
use App\Models\Type_obj;
use App\Models\Wells_type;
use App\Ref_opo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    //******************* Обзор типов событий календаря ****************************
    public function show_calendar_event()
    {
        $data_ok = CalendarEventType::orderBy('id')->get();
        return view('web.docs.matrix.calendar_events.index', compact('data_ok'));
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
        AdminController::log_record('Открыл список предписаний РТН');//пишем в журнал
        $data = Rtn::orderByDesc('id')->get();
        return view('web.docs.matrix.predRTN.index', compact('data'));
    }
    public function edit_RTN($id)
    {
        $data = Rtn::find($id);
        $data_all = Ref_opo::all();
        AdminController::log_record('Открыл для редактирования предписание РТН');//пишем в журнал
        return view('web.docs.matrix.predRTN.edit',compact('data', 'data_all'));
    }
    public function update_RTN(Request $request, $id)
    {

        $input = $request->all();
        $data = Rtn::find($id);
        $data->update($input);
        AdminController::log_record('Сохранил после редактирования предписание РТН');//пишем в журнал
        return redirect("/docs/predRTN");
    }
    public function show_RTN($id)
    {
        $data = Rtn::find($id);
        $data_all = Ref_opo::all();
        AdminController::log_record('Открыл для просмотра предписание РТН');//пишем в журнал

        return view('web.docs.matrix.predRTN.show',compact('data', 'data_all'));
    }
    public function create_RTN()
    {
        $data_all = Ref_opo::all();
        return view('web.docs.matrix.predRTN.create', compact('data_all'));
    }
    public function store_RTN(Request $request)
    {
        $input = $request->all();
        $predRTN = Rtn::create($input);
        AdminController::log_record('Создал запись предписания РТН');//пишем в журнал
        return redirect('/docs/predRTN');
    }
    public function delete_RTN($id)
    {
        Rtn::find($id)->delete();
        AdminController::log_record('Удалил запись предписания РТН');//пишем в журнал
        return redirect('/docs/predRTN');
    }

    //******************** Справочник ОПО ****************************

    public function show_OPO_all()
    {
        $data = Ref_opo::orderBy('idOPO')->get();
        AdminController::log_record('Открыл справочник ОПО');//пишем в журнал
        return view('web.docs.matrix.infoOPO.index', compact('data'));
    }
    public function edit_OPO($idOPO)
    {
        $data = Ref_opo::find($idOPO);
        AdminController::log_record('Открыл для редактирования запись в справочнике ОПО');//пишем в журнал
        return view('web.docs.matrix.infoOPO.edit',compact('data'));
    }
    public function update_OPO(Request $request, $idOPO)
    {
        $input = $request->all();
        $data = Ref_opo::find($idOPO);
        $data['login'] = Auth::user()->name;
        $data->update($input);
        AdminController::log_record('Сохранил после редактирования запись в справочнике ОПО');//пишем в журнал
        return redirect("/docs/infoOPO");
    }
    public function show_OPO($idOPO)
    {
        $data = Ref_opo::find($idOPO);
        AdminController::log_record('Открыл для просмотра запись о ОПО');//пишем в журнал
        return view('web.docs.matrix.infoOPO.show',compact('data'));
    }
    public function create_OPO()
    {
        return view('web.docs.matrix.infoOPO.create');
    }
    public function store_OPO(Request $request)
    {
        $input = $request->all();
        $input['login'] = Auth::user()->name;
        $predRTN = Ref_opo::create($input);
        AdminController::log_record('Создал запись в справочнике ОПО');//пишем в журнал
        return redirect('/docs/infoOPO');
    }
    public function delete_OPO($idOPO)
    {
        Ref_opo::find($idOPO)->delete();
        AdminController::log_record('Удалил запись в справочнике ОПО');//пишем в журнал
        return redirect('/docs/infoOPO');
    }

    //******************** Справочник элементов ОПО ****************************

    public function show_Obj_all()

    {
        $data = Ref_obj::orderBy('idObj')->where('idOPO', '>', '0')->get();
        AdminController::log_record('Открыл справочник элементов ОПО');//пишем в журнал
        return view('web.docs.matrix.infoObj.index', compact('data'));
    }
    public function edit_Obj($idObj)
    {
        $data = Ref_obj::find($idObj);
        $data_all = Wells_type::all();
        $data_opo = Ref_opo::all();
        $data_obj_type = Type_obj::all();
        $data_status = Status_obj::all();
        AdminController::log_record('Открыл для редактирования запись в справочнике элементов ОПО');//пишем в журнал
        return view('web.docs.matrix.infoObj.edit',compact('data', 'data_all', 'data_opo', 'data_obj_type', 'data_status'));
    }
    public function update_Obj(Request $request, $idObj)
    {
        $input = $request->all();
        $data = Ref_obj::find($idObj);
        $data->update($input);
        AdminController::log_record('Сохранил после редактирования запись в справочнике элементов ОПО');//пишем в журнал
        return redirect("/docs/infoObj");
    }
    public function show_Obj($idObj)
    {
        $data = Ref_obj::find($idObj);
        $data_all = Wells_type::all();
        $data_opo = Ref_opo::all();
        $data_obj_type = Type_obj::all();
        $data_status = Status_obj::all();
        AdminController::log_record('Открыл для просмотра запись о элементе ОПО');//пишем в журнал
        return view('web.docs.matrix.infoObj.show',compact('data', 'data_all', 'data_opo', 'data_obj_type', 'data_status'));
    }
    public function create_Obj()
    {
        $data_all = Wells_type::all();
        $data_opo = Ref_opo::all();
        $data_obj_type = Type_obj::all();
        $data_status = Status_obj::all();
        return view('web.docs.matrix.infoObj.create',compact('data_all', 'data_opo', 'data_obj_type', 'data_status'));
    }
    public function store_Obj(Request $request)
    {
        $input = $request->all();
        $predRTN = Ref_obj::create($input);
        AdminController::log_record('Создал запись в справочнике элементов ОПО');//пишем в журнал
        return redirect('/docs/infoObj');
    }
    public function delete_Obj($idObj)
    {
        Ref_obj::find($idObj)->delete();
        AdminController::log_record('Удалил запись в справочнике элементов ОПО');//пишем в журнал
        return redirect('/docs/infoObj');
    }

    //******************** Справочник ТБ элементов ОПО ****************************

    public function show_TB_all()
    {
        $data = Ref_oto::orderBy('idOTO')->get();
        AdminController::log_record('Открыл справочник ТБ элементов ОПО');//пишем в журнал
        return view('web.docs.matrix.infoTB.index', compact('data'));
    }
    public function edit_TB($idOTO)
    {
        $data = Ref_oto::find($idOTO);
        $data_all = Type_obj::all();
        AdminController::log_record('Открыл для редактирования запись в справочнике ТБ элемента ОПО');//пишем в журнал
        return view('web.docs.matrix.infoTB.edit',compact('data', 'data_all'));
    }
    public function update_TB(Request $request, $idOTO)
    {
        $data = Ref_oto::find($idOTO);
        if($request->hasFile('image')) {
            $doc = $request->file('image');
            $doc->move(public_path() . '/storage/oto',$doc->getClientOriginalName());
            $name_doc = "oto/".$doc->getClientOriginalName();
        }
        else
            $name_doc = $data->image;

        $input = $request->all();
        $input['image'] = $name_doc;
        $data->update($input);
        AdminController::log_record('Сохранил после редактирования запись в справочнике ТБ элемента ОПО');//пишем в журнал
        return redirect("/docs/infoTB");
    }
    public function show_TB($idOTO)
    {
        $data = Ref_oto::find($idOTO);
        $data_all = Type_obj::all();
        AdminController::log_record('Открыл запись о ТБ элемента ОПО');//пишем в журнал
        return view('web.docs.matrix.infoTB.show',compact('data', 'data_all'));
    }
    public function create_TB()
    {
        $data_all = Type_obj::all();
        return view('web.docs.matrix.infoTB.create',compact('data_all'));
    }
    public function store_TB(Request $request)
    {
        if($request->hasFile('image')) {
            $doc = $request->file('image');
            $doc->move(public_path() . '/storage/oto',$doc->getClientOriginalName());
        }
        $input = $request->all();
        $input['image'] = "oto/".$doc->getClientOriginalName();
        $predRTN = Ref_oto::create($input);
        AdminController::log_record('Создал запись в справочнике ТБ элемента ОПО');//пишем в журнал
        return redirect('/docs/infoTB');
    }
    public function delete_TB($idOTO)
    {
        Ref_oto::find($idOTO)->delete();
        AdminController::log_record('Удалил запись в справочнике ТБ элемента ОПО');//пишем в журнал
        return redirect('/docs/infoTB');
    }

    public function change_param(Request $request){
        if ($request->type=='rtn'){
            return ActionPlan::update_param($request->id, $request->param, $request->value);
        };
    }

}
