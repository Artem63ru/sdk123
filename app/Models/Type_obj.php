<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_obj extends Model
{
    protected $table = 'public.type_obj';
    public $primaryKey = 'type_id';

    //************************** Отношение ко многим элементам ОПО *********************************************
    public function type_to_obj()
    {
        return $this->hasMany('App\Models\Ref_obj', 'typeObj', 'type_id')->orderBy('idObj')->get();
    }
    //************************** Отношение ко многим ТБ эелемента опо *********************************************
    public function type_to_tb()
    {
        return $this->hasMany('App\Models\Ref_oto', 'typeObj', 'type_id');
    }
    //************************** Отношение ко многим сценариям *********************************************
    public function type_to_matrix()
    {
        return $this->hasMany('App\Models\Matrix\DangerousEvent', 'from_type_obj', 'type_id');
    }

}
