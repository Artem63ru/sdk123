<?php

namespace App\Models\Report_history;

use Illuminate\Database\Eloquent\Model;

class RepiatReport extends Model
{
    protected $table = 'reports.repiat_report';

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $fillable = [
        'name_opo', 'name_elem', 'name_violation', 'num_1_level', 'num_2_level', 'num_3_level', 'num_4_level', 'num_all', 'percent_ok', 'percent_ok_all', 'type', 'date', 'id_in_calc',
    ];
}
