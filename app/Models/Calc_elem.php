<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calc_elem extends Model
{
    protected $table = 'public.calc_ip_elem';
    public $timestamps = true;
    public $primaryKey = 'id';
    public function calc_to_elem()
    {
        return $this->belongsTo('App\Models\Ref_Obj', 'from_elem', 'idObj');
    }
    public function calc_elem_to_status()
    {
        return $this->belongsTo('App\Models\Status_work', 'status_ip_el', 'id');
    }

}
