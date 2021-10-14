<?php

namespace App\Models\Report_history;

use Illuminate\Database\Eloquent\Model;

class ScenaReport extends Model
{
    protected $table = 'reports.scena_report';

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $fillable = [
        'date_event', 'name_opo', 'name_obj', 'name_scena', 'class_event', 'status', 'id_in_calc', 'date', 'type',
    ];
}
