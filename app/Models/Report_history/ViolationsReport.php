<?php

namespace App\Models\Report_history;

use Illuminate\Database\Eloquent\Model;

class ViolationsReport extends Model
{
    protected $table = 'reports.violations_report';

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $fillable = [
        'desc_violation', 'name_obj', 'level_km', 'severity_fatal', 'direction', 'infi_repeat', 'plan_work', 'plan_date', 'plan_pers', 'violation_status', 'type', 'date', 'id_in_calc',
    ];
}
