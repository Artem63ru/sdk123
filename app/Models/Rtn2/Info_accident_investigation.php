<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Info_accident_investigation extends Model
{
    protected $table = 'rtn2.info_accident_investigation';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'type_accident', 'desc_accident', 'place', 'date_accident', 'respons_worker', 'check_event', 'event',
    ];

}
