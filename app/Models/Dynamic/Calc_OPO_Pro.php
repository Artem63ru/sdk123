<?php

namespace App\Models\Dynamic;

use Illuminate\Database\Eloquent\Model;

class Calc_OPO_Pro extends Model
{
    protected $table = 'apk_opo.calc_pro_ip_opoi';
    public $timestamps = true;
    public $primaryKey = 'id';
    //************** Отношение к ОПО вычислений
    public function calc_opo_pro_to_elem()
    {
        return $this->belongsTo('App\Ref_opo', 'from_opo', 'idOPO');
    }
}
