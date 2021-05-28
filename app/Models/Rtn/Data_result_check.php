<?php

namespace App\Models\Rtn;

use Illuminate\Database\Eloquent\Model;

class Data_result_check extends Model
{
    protected $table = 'rtn.data_result_check';

    public $timestamps = false;

    protected $fillable = [
        'num_order', 'date_order', 'name_order', 'desc_order', 'name_f', 'name_l', ' name_p', 'desc_violation', 'time_violation', 'date_violation', 'reasons_nonperf', 'confirm_doc', 'year_report',
    ];

}
