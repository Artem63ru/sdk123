<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_work extends Model
{


    protected $table = 'public.status_work';

    public $timestamps = false;

    public function status_to_calc_ip_opo_i()
    {
        return $this->hasMany('App\Models\Calc_ip_opo_i', 'status', 'id');
    }
    public function status_to_calc_ip_elem()
    {
        return $this->hasMany('App\Models\Calc_elem', 'status_ip_el', 'id');
    }
}
