<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm;
    public $users;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->users = User::where('name', 'ilike', $searchTerm)->get();
        return view('livewire.search');
    }
}
