<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Info_plan extends Model
{
    protected $table = 'rtn2.info_plan';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'name_event', 'date_accept', 'check_event', 'file', 'reason_nonpref', 'recvisits_1', 'recvisits_2', 'check_require', 'doc', 'reason_nonpref_require',
    ];

}
