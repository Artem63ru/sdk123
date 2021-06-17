<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

class Form61 extends Model
{
    protected $table = 'reports.form61';

    public $timestamps = false;

    protected $fillable = [
        'vid_1',
        'vid_2' ,
        'vid_3' ,
        'vid_4',
        'vid_5',
        'vid_6',
        'victim',
        'date',
        'supervision',
        'name_organisation',
        'adress',
        'place',
        'num_obj',
        'desc_accident',
        'event_organisation',
        'passed',
        'passed_data',
        'accepted',
        'accepted_data',
        'date_accept',
        'reason_delay',
        'create_user',
        'create_add',

    ];
}
