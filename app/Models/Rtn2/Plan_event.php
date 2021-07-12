<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Plan_event extends Model
{
    protected $table = 'rtn2.plan_event';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'name_event', 'time',
    ];
}
