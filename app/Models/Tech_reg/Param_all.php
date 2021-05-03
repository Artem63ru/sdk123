<?php

namespace App\Models\Tech_reg;

use Illuminate\Database\Eloquent\Model;

class Param_all extends Model
{
    protected $table = 'tech_reg.param_all';
    public $timestamps = true;
    public $primaryKey = 'id';

//***************** Отношение параметра к таблице измерения *********************************
    public function param_to_si()
    {
        return $this->belongsTo('App\Models\Tech_reg\Table_si', 'si', 'id');
    }
//***************** Отношение параметра к таблице типа параметра Дискретный или аналог *********************************
    public function param_to_type()
    {
        return $this->belongsTo('App\Models\Tech_reg\Type_param', 'type', 'typeid');
    }


}
