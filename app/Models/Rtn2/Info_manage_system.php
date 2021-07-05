<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Info_manage_system extends Model
{
    protected $table = 'rtn2.info_manage_system';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'date_act', 'date_plan_from', 'period_event', 'analitic',
    ];

}
