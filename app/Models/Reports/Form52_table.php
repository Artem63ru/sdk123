<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

class Form52_table extends Model
{
    protected $table = 'reports.form52_table';

    public $timestamps = false;

    public $primaryKey = 'id_event';

    protected $fillable = [
        'num',
        'context',
        'responsible',
        'time_event',
        'note',
        'id_act'
        ];
    public function event_to_form()
    {
        return $this->belongsTo('App\Models\Reports\Form52', 'id', 'id_act');

    }
}
