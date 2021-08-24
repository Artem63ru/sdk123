<?php

namespace App\Http\Livewire;

use App\Models\Calc_opo;
use Livewire\Component;
use App\Models\StrukturaPAO;

class MapGda extends Component
{
    public function render()
    {
        $all_data_last = Calc_opo::orderByDesc('id')->first();
        $min_last = min($all_data_last['ip_opo_1'], $all_data_last['ip_opo_2'], $all_data_last['ip_opo_3'], $all_data_last['ip_opo_4'], $all_data_last['ip_opo_5'], $all_data_last['ip_opo_6'], $all_data_last['ip_opo_7'],
            $all_data_last['ip_opo_8'], $all_data_last['ip_opo_9']);
        return view('livewire.map-gda', ['rows'=> StrukturaPAO::orderby('id')->get()], compact('min_last'));
    }
}
