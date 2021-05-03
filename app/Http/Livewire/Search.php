<?php

namespace App\Http\Livewire;

use App\Ref_obj;
use App\Ref_opo;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component

{
    public $searchTerm = '';
    public $users;
    public $id_opo;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        //    $this->users = $ver_opo->opo_to_obj->where('nameObj', 'ilike', $searchTerm); // Перечень всех лементов ОПО
        $this->users = Ref_obj::where([['nameObj', 'ilike', $searchTerm], ['idOPO', '=', $this->id_opo]])->get();
        return view('livewire.search');
    }


}
