<?php

namespace App\Models\Rtn;

use Illuminate\Database\Eloquent\Model;

class Data_check_out extends Model
{
    protected $table = 'rtn.data_check_out';

    public $timestamps = false;

    protected $fillable = [
        'depart_do', 'reg_num_opo', 'date_check_out', 'name_f', 'name_l', 'name_p', 'stop_work', 'char_violation', 'norm_act', 'point_act', 'name_event', 'time_violation', 'date_violation', 'reasons_nonperf', 'data_reasons', 'reasons_post', 'worker_violation', 'offers_spb', 'year_report',
    ];

}
