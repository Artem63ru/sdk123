<?php

namespace App\Models\Dynamic;

use Illuminate\Database\Eloquent\Model;

class Calc_tb extends Model
{
    protected $table = 'dynamic.calc_tb2';
    public $timestamps = true;
    public $primaryKey = 'id';
    //************** Отношение к элементу вычислений
    public function calc_tb_to_elem()
    {
        return $this->belongsTo('App\Ref_Obj', 'from_obj', 'idObj');
    }
}
