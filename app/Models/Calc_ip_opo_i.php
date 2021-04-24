<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calc_ip_opo_i extends Model
{
    protected $table = 'public.calc_ip_opoi';
    public $timestamps = true;
    public $primaryKey = 'id';

    public function calc_to_opo()
    {
        return $this->belongsTo('App\Ref_opo', 'from_opo', 'idOPO');
    }
    public function calc_to_status()
    {
        return $this->belongsTo('App\Models\Status_work', 'status', 'id');
    }
}
