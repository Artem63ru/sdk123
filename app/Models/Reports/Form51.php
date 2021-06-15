<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

class Form51 extends Model
{
    protected $table = 'reports.form51';

    public $timestamps = false;

    protected $fillable = [
        'vid_1',
    'victim' ,
    'date' ,
    'supervision',
    'organisation',
    'adress',
    'place_accident',
    'num_obj',
    'result_acccident',
    'passed',
    'accepted',
    'date_accept',
    'reason_delay',
    'create_user',
    'create_add',
    ];
}
