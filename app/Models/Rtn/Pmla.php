<?php

namespace App\Models\Rtn;

use Illuminate\Database\Eloquent\Model;

class Pmla extends Model
{
    protected $table = 'rtn.pmla';

    public $timestamps = false;

    protected $fillable = [
        'name_crash', 'level_crash', 'place_crash', 'sign_crash', 'metod_protect', 'name_paz', 'name_f', 'name_l', 'name_p', 'education_worker', 'exper_worker', 'date_certif', 'order_action', 'comments', 'year_report',
    ];

}
