<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Info_building extends Model
{
    protected $table = 'rtn2.info_building';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'name', 'year_exp', 'date_reconstruction', 'date_repair', 'date_next_check', 'date_check', 'result_check', 'percent_event', 'file',
    ];

}
