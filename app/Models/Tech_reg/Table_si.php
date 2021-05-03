<?php

namespace App\Models\Tech_reg;

use Illuminate\Database\Eloquent\Model;

class Table_si extends Model
{
    protected $table = 'tech_reg.table_si';
    public $timestamps = true;
    public $primaryKey = 'id';
//***************** Отношение таблици измерения к параметру *********************************
    public function si_to_param()
    {
        return $this->hasMany('App\Models\Tech_reg\Param_all', 'si', 'id');
    }
}
