<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Status_tu extends Model
{
    protected $table = 'rtn2.status_tu';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'num_tu', 'name_tu', 'serial_num', 'industrial_num', 'invent_num', 'type_auto', 'type', 'vid_auto', 'vid', 'mark', 'country', 'time_exp', 'year_exp', 'old_percent', 'repair_info', 'num_doc', 'doc_check', 'date_check', 'result_check', 'info_event_check', 'accept_time', 'accept_kol_vo', 'fact_time', 'fact_kol_vo', 'check_control', 'info_demo_tu', 'time_demo', 'info_devices', 'info_event', 'tu_repair_check', 'num_new_tu',
    ];
}
