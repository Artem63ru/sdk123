<?php

namespace App\Models\Rtn;

use Illuminate\Database\Eloquent\Model;

class Report_tu extends Model
{
    protected $table = 'rtn.report_tu';

    public $timestamps = false;

    protected $fillable = [
        'reg_n_opo', 'reg_n_tu', 'name_tu', 'serial_n_tu', 'gos_reg_n', 'factory_n_tu', 'type_tu', 'vid_tu', 'marks_tu', 'service_life', 'commissioning', 'wear_out', 'date_exam', 'date_next_exam', 'date_to', 'date_next_to', 'perm_life', 'safety_device', 'type_safety_dev', 'volume', 'pressure', 'diam', 'gs_type', 'gs_sub_type', 'or_volume', 'gs_mass', 'or_pressure', 'year_modern', 'activities_carried', 'sert_type', 'sert_number', 'sert_date', 'sert_issued',
    ];

}
