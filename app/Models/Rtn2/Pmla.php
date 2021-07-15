<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Pmla extends Model
{
    protected $table = 'rtn2.pmla';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'date_accept', 'time', 'name_service', 'time_evidence', 'info_other_service', 'pmla_copy',
    ];
}
