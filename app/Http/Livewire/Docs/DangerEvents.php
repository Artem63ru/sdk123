<?php

namespace App\Http\Livewire\Docs;

use http\Params;
use Livewire\Component;
use App\Models\Matrix\DangerousEvent;
use App\Models\Matrix\DiagnEvent;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
class DangerEvents extends Component
{
    use WithPagination;
    public $search = '';
    public bool $trigger=false;
    public bool $triggerNew=false;
    public int $realId;

    public function database($request) {
        $this-> realId = $request;
        $oldTriger=(bool)DB::table('scena.diagn_event')
            ->where('id', $this->realId)
            ->value('triger');
        $this-> trigger = $oldTriger;
        $newTriger=!$oldTriger;
        $this-> triggerNew = (bool)$newTriger;

        DB::table('scena.diagn_event')
                ->where('id', $this->realId)
                ->update(['data_up' =>  date('Y-m-d H:i:s.u'),
                    'triger'=>$this->triggerNew]);

    }
    public function render()
    {
        if ($this->search <>'')
            return view('livewire.docs.danger-events', ['rows' => DangerousEvent::orwhere('from_type_obj', '=', $this->search)->orderby('id')->get()]);
        else
             return view('livewire.docs.danger-events', ['rows' => DangerousEvent::orderby('id')->get()]);

    }
}
