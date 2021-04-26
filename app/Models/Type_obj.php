<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_obj extends Model
{
    protected $table = 'public.type_obj';
    public $primaryKey = 'type_id';

    //************************** Выбор элементов конкретного ОПО *********************************************
    public function type_to_obj()
    {
        return $this->hasMany('App\Ref_obj', 'typeObj', 'type_id')->orderBy('idObj')->get();
    }
    //************************** Выбор ТБ из таблицы оборудования *********************************************
    public function type_to_tb()
    {
        return $this->hasMany('App\Models\Ref_oto', 'typeObj', 'type_id');
    }

}
