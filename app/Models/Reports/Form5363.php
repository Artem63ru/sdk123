<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

class Form5363 extends Model
{
    protected $table = 'reports.form5363';

    public $timestamps = false;

    public function form_to_event()
    {
        return $this->hasMany('App\Models\Reports\Form5363_table', 'id_act', 'id')->orderBy('id_event');
    }

    protected $fillable = [
        'date1',
        'date2' ,
        'partGDA' ,
        'app',
        'namePB',
        'create_user',
        'create_add',


    ];
}
