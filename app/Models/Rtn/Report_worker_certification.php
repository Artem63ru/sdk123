<?php

namespace App\Models\Rtn;

use Illuminate\Database\Eloquent\Model;

class Report_worker_certification extends Model
{
    protected $table = 'rtn.report_worker_certification';

    public $timestamps = false;

    protected $fillable = [
        'type_super', 'manager', 'special', 'worker', 'all_work',
    ];
}
