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
        return $this->belongsTo('App\Ref_Obj', 'from_elem', 'idObj');
    }

}
