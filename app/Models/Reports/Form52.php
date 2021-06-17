<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

class Form52 extends Model
{
    protected $table = 'reports.form52';

    public $timestamps = false;

    public function form_to_event()
    {
        return $this->hasMany('App\Models\Reports\Form52_table', 'id_act', 'id')->orderBy('id_event');
    }

    protected $fillable = [
        'act_num',
        'tag_unitGDA' ,
        'date_accident' ,
        'name_object',
        'predsed',
        'data_predsed',
        'zam_predsed',
        'data_zam',
        'characteristic',
        'info_accident',
        'reason_accident',
        'result',
        'stop_time',
        'result_acccident',
        'same_accident',
        'act_date',
        'app',
        'create_user',
        'create_add',
        'data_comission',
    ];
}
