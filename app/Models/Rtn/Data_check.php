<?php

namespace App\Models\Rtn;

use Illuminate\Database\Eloquent\Model;

class Data_check extends Model
{
    protected $table = 'rtn.data_check';

    public $timestamps = false;

    protected $fillable = [
        'number_work', 'tick_stand', 'rating_work', 'rating_reasons', 'reg_num_reasons', 'quant_lesson_work', 'quant_lesson_alarms', 'plan_lesson_work', 'plan_lesson_crash', 'plan_lesson_alarms', 'plan_next_alarms', 'size_works', 'year_report',  'reg_num_opo',
    ];

}
