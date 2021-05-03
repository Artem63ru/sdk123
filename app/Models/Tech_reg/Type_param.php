<?php

namespace App\Models\Tech_reg;

use Illuminate\Database\Eloquent\Model;

class Type_param extends Model
{
    protected $table = 'tech_reg.type_param';
    public $timestamps = true;
    public $primaryKey = 'id';

    //***************** Отношение типа параметра к параметру Дискретный или аналог *********************************
    public function type_to_param()
    {
        return $this->hasMany('App\Models\Tech_reg\Param_all', 'type', 'typeid');
    }


}
