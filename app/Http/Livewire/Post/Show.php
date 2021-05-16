<?php

namespace App\Http\Livewire\Post;

use App\Models\Matrix\Event_types;
use Livewire\WithPagination;
use App\User;
use Livewire\Component;


class Show extends Component
{
    use WithPagination;
    public $search = '';
    public $users;
   // public $filters = '';
    public $showEditModal = false;
  //  public Event_types $editing;


    public function edit(Event_types $user)
    {
  //      $this->editing = $user;

        $this->showEditModal = true;
    }

    public function save()
    {
    //    $this->validate();

    //    $this->editing->save();

        $this->showEditModal = false;
    }


    public function render()
    {
        if ($this->search <>'') {
            $search = '%' . $this->search . '%';
         //   $this->events = Event_types::orwhere('from_type_obj', '=', $this->search)->orderBy('id')->get();
            return view('livewire.post.show', [
                'events'=> Event_types::orwhere('from_type_obj', '=', $this->search)->orderBy('id')->simplePaginate(28),
            ]);
        }
        else
        {
            //  $search = '%' . $this->search . '%';
          //  $this->users = Event_types::orderby('id')->paginate(15);
            return view('livewire.post.show', [
                'events'=>Event_types::orderby('id')->simplePaginate(28),
            ]);
        }

    }
}
