<?php

namespace App\Http\Livewire\Docs;

use App\Http\Controllers\AdminController;
use App\Models\Tech_reg\Table_si;
use App\Models\Tech_reg\Tech_reglament;
use App\Models\Type_obj;
use Livewire\Component;
use Livewire\WithPagination;

class Reglament extends Component
{
    use WithPagination;
    public $search1 = '';
    public $search2 = '';
    public $search3 = '';
    public $min;
    public $max;
    public $koef;
    public $tech_id;
    public $name;

    public function render()
    {
        $table_si = Table_si::orderBy('id')->get();
        $i = 1;
        foreach ($table_si as $row){
            $si[$i] = $row->name;
            $i++;
        }
        $type_signal[1] = 'Аналоговый';
        $type_signal[10] = 'Дискретный';
        $visible_wells = 0;
        if ($this->search1 == 1 || $this->search1 == 3) {
            $visible_wells = 1;
            if ($this->search2 <> '') {
                $search_name_param = '%' . $this->search3 . '%';
                return view('livewire.docs.reglament', [
                    'type_obj' => Type_obj::all()->where('type_name', '!=', 'Документация')->where('type_name', '!=', 'Персонал'),
                    'reglaments'=> Tech_reglament::join('tech_reg.param_all', 'teh_reglament.from_param_all', '=', 'param_all.id')->select('teh_reglament.id as id_teh_reglament',
                    'from_param_all', 'min', 'max', 'koef', 'idObj', 'wells', 'asutp_name', 'full_name', 'from_type_obj', 'kip_name', 'reglament', 'matrix', 'si', 'type', 'descr_full', 'from_project')->
                    where('full_name', 'ilike', $search_name_param)->where('idObj', '=', $this->search1)->where('wells', '=', $this->search2)->orderBy('teh_reglament.id')->get(),
                    'visible_wells' => $visible_wells,
                    'si'=> $si,
                    'type_signal'=> $type_signal,
                ]);
            } else {
                $search_name_param = '%' . $this->search3 . '%';
                return view('livewire.docs.reglament', [
                    'type_obj' => Type_obj::all()->where('type_name', '!=', 'Документация')->where('type_name', '!=', 'Персонал'),
                    'reglaments'=> Tech_reglament::join('tech_reg.param_all', 'teh_reglament.from_param_all', '=', 'param_all.id')->select('teh_reglament.id as id_teh_reglament',
                        'from_param_all', 'min', 'max', 'koef', 'idObj', 'wells', 'asutp_name', 'full_name', 'from_type_obj', 'kip_name', 'reglament', 'matrix', 'si', 'type', 'descr_full', 'from_project')->
                    where('full_name', 'ilike', $search_name_param)->where('idObj', '=', $this->search1)->orderBy('teh_reglament.id')->get(),
                    'visible_wells' => $visible_wells,
                    'si'=> $si,
                    'type_signal'=> $type_signal,
                ]);
            }
        } elseif ($this->search1 == '') {
            $visible_wells = 0;
            $search_name_param = '%' . $this->search3 . '%';
            return view('livewire.docs.reglament', [
                'type_obj'=> Type_obj::all()->where('type_name', '!=', 'Документация')->where('type_name', '!=', 'Персонал'),
                'reglaments'=> Tech_reglament::join('tech_reg.param_all', 'teh_reglament.from_param_all', '=', 'param_all.id')->select('teh_reglament.id as id_teh_reglament',
                    'from_param_all', 'min', 'max', 'koef', 'idObj', 'wells', 'asutp_name', 'full_name', 'from_type_obj', 'kip_name', 'reglament', 'matrix', 'si', 'type', 'descr_full', 'from_project')->
                    where('full_name', 'ilike', $search_name_param)->orderBy('teh_reglament.id')->get(),
                'visible_wells' => $visible_wells,
                'si'=> $si,
                'type_signal'=> $type_signal,
            ]);
        }
        else{
            $visible_wells = 0;
            $this->search2 = '';
            $search_name_param = '%' . $this->search3 . '%';
            return view('livewire.docs.reglament', [
                'type_obj'=> Type_obj::all()->where('type_name', '!=', 'Документация')->where('type_name', '!=', 'Персонал'),
                'reglaments'=> Tech_reglament::join('tech_reg.param_all', 'teh_reglament.from_param_all', '=', 'param_all.id')->select('teh_reglament.id as id_teh_reglament',
                    'from_param_all', 'min', 'max', 'koef', 'idObj', 'wells', 'asutp_name', 'full_name', 'from_type_obj', 'kip_name', 'reglament', 'matrix', 'si', 'type', 'descr_full', 'from_project')->
                where('full_name', 'ilike', $search_name_param)->where('idObj', '=', $this->search1)->orderBy('teh_reglament.id')->get(),
                'visible_wells' => $visible_wells,
                'si'=> $si,
                'type_signal'=> $type_signal,
            ]);
        }
    }

    public function submit()
    {
        $validatedDate = $this->validate([
            'min' => 'required',
            'max' => 'required',
            'koef' => 'required',
        ]);
        Tech_reglament::create($validatedDate);
        AdminController::log_record('Создал запись в справочнике технологических регламентов');//пишем в журнал
        //   $this->resetInputFields();
        return redirect()->to('/docs/reglament');

    }

    public function delete($id)
    {
        if($id){
            Tech_reglament::where('id',$id)->delete();
            AdminController::log_record('Удалил запись из справочника технологических регламентов');//пишем в журнал
            session()->flash('message', 'Events Deleted Successfully.');
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $tech_r= Tech_reglament::where('id',$id)->first();
        $this->tech_id = $id;
        $this->name = $tech_r->reglament_to_param->full_name;
        $this->min = $tech_r->min;
        $this->max = $tech_r->max;
        $this->koef = $tech_r->koef;
        AdminController::log_record('Открыл для редактирования запись из справочника технологических регламентов');//пишем в журнал
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'min' => 'required',
            'max' => 'required',
            'koef' => 'required',
        ]);

        if ($this->tech_id) {
            $event = Tech_reglament::find($this->tech_id);
            $event->update([
                'min' => $this->min,
                'max' => $this->max,
                'koef' => $this->koef,
            ]);
            AdminController::log_record('Сохранил после редактирования запись из справочника технологических регламентов');//пишем в журнал
            $this->updateMode = false;
            session()->flash('message', 'Events Updated Successfully.');
            //     $this->resetInputFields();
            return redirect()->to('/docs/reglament');
        }
    }
}
