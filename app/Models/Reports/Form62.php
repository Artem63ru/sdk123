<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

class Form62 extends Model
{
    protected $table = 'reports.form62';

    public $timestamps = false;

    protected $fillable = [
        'info_organisation',
        'predsed' ,
        'data_predsed' ,
        'data_comission',
        'char_organisation',
        'info_worker',
        'info_acccident',
        'tech_reason',
        'organisation_reason',
        'other_reason',
        'event',
        'result',
        'result_acccident',
        'act_date',
        'description',
        'create_user',
        'create_add',
        'date_accident',


    ];
}
