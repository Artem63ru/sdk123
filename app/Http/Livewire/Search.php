<?php

namespace App\Http\Livewire;

use App\Models\APK_SDK;
use App\Models\Ref_obj;
use App\Ref_opo;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component

{
    public $searchTerm = '';
    public $users;
    public $id_opo;
    public $id_obj;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        //    $this->users = $ver_opo->opo_to_obj->where('nameObj', 'ilike', $searchTerm); // Перечень всех лементов ОПО
        $this->users = Ref_obj::where([['nameObj', 'ilike', $searchTerm], ['idOPO', '=', $this->id_opo],['status', '=', '50'],['InUse', '=', '1']])->orderBy('idObj')->get();
        $flComplete = 0; //не снятые предписания
        $APK_SDK = APK_SDK::where('idOPO', '=', $this->id_opo)->where('flComplete', '=', $flComplete)->get();
        $apk_info = [];
        foreach ($APK_SDK as $apk){
            $apk_info[$apk->idObj][$apk->idOTO] = 1;
        }
        return view('livewire.search', compact('apk_info'));
    }


}
