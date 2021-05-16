<?php

namespace App\Http\Livewire;

use App\Models\Matrix\Event_types;
use Livewire\WithPagination;
use App\User;
use Livewire\Component;

class EventTypes extends Component
{
    use WithPagination;
    public $search = '';
    public $users;
    public $name;
    public $from_type_obj;
    public $event_id;

    private function resetInputFields(){
        $this->name = '';
        $this->from_type_obj = '';
    }

    public function submit()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'from_type_obj' => 'required',
        ]);
        Event_types::create($validatedDate);
        $this->resetInputFields();
        return redirect()->to('/docs/events');

    }

    public function render()
    {
        if ($this->search <>'') {
           return view('livewire.event-types', [
                'events'=> Event_types::orwhere('from_type_obj', '=', $this->search)->orderBy('id')->get(),
            ]);
        }
        else
        {
           return view('livewire.event-types', [
                'events'=>Event_types::orderby('id')->get(),
            ]);
        }

    }
    public function delete($id)
    {
        if($id){
            Event_types::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $event= Event_types::where('id',$id)->first();
        $this->event_id = $id;
        $this->name = $event->name;
        $this->from_type_obj = $event->from_type_obj;

    }
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'from_type_obj' => 'required',
        ]);

        if ($this->event_id) {
            $event = Event_types::find($this->event_id);
            $event->update([
                'name' => $this->name,
                'from_type_obj' => $this->from_type_obj,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();
            return redirect()->to('/docs/events');
        }
    }
}
