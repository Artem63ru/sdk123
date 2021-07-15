<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

class Form5363_table extends Model
{
    protected $table = 'reports.form5363_table';

    public $timestamps = false;

    public $primaryKey = 'id_event';


    protected $fillable = [
        'num_event',
        'date',
        'place',
        'date_act',
        'event',
        'time_event',
        'check_event',
        'info',
        'id_act'

    ];

    public function event_to_form()
    {
        return $this->belongsTo('App\Models\Reports\Form5363', 'id', 'id_act');
    }
}
