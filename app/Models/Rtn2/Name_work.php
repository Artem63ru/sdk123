<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Name_work extends Model
{
    protected $table = 'rtn2.name_work';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'name_job', 'num_tu', 'reason_stop', 'time_stop', 'check_event', 'date_act', 'num_act',
    ];

}
