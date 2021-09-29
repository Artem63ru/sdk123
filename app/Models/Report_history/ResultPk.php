<?php

namespace App\Models\Report_history;

use Illuminate\Database\Eloquent\Model;

class ResultPk extends Model
{
    protected $table = 'reports.result_pk';

    public $timestamps = false;

    protected $fillable = [
        'date_check_out', 'name_f', 'name_l', 'name_p', 'char_violation', 'norm_act', 'point_act', 'name_event', 'time_violation', 'date_violation', 'reasons_nonpref', 'data_reasons', 'reasons_post', 'worker_violation', 'id_in_calc', 'date', 'type'
    ];

}
