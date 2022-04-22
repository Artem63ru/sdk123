<?php

namespace App\Models\Dynamic;

use Illuminate\Database\Eloquent\Model;

class Wels1 extends Model
{
    protected $table = 'dynamic.wells_1que';
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'aah001_xp03',
        'tah009_xk03',
        'fal001_xp01',
        'pal012_xp01',
        'pal035_xh01',
        'pal003_xh01',
        'zlc004_xb21',
        'eal003_xh01',
        ];
    //************** Отношение к элементу вычислений
    public function calc_welss_to_elem()
    {
        return $this->belongsTo('App\Models\Ref_Obj', 'from_ref_obj', 'idObj');
    }
}
