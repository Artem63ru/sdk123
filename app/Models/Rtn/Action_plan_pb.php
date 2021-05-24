<?php

namespace App\Models\Rtn;

use Illuminate\Database\Eloquent\Model;

class Action_plan_pb extends Model
{
    protected $table = 'rtn.action_plan_pb';

    public $timestamps = false;

    protected $fillable = [
        'reg_num_opo', 'name_event', 'date_perfom', 'name_f', 'name_l', 'name_p', 'date_compl', 'date_transfer', 'reasons_post', 'reasons_transfer', 'check_exe', 'note', 'year_report',
    ];

}
