<?php

namespace App\Models\Rtn;

use Illuminate\Database\Eloquent\Model;

class Report_worker extends Model
{
    protected $table = 'rtn.report_worker';

    public $timestamps = false;

    protected $fillable = [
        'surname', 'name', 'sub_name', 'post', 'education', 'work_exp', 'last_attestation', 'responsibility',
    ];
}
