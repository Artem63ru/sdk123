<?php

namespace App\Models\Matrix;

use Illuminate\Database\Eloquent\Model;

class DangerousEvent extends Model
{
    protected $table = 'scena.dangerous_event';

    public $timestamps = false;

    protected $fillable = [
        'from_type_obj', 'from_tech_event_type',
        'from_wells_project', 'from_wells_type',
    ];
    //************************** Отношение к одному типу *********************************************
    public function matrix_to_type()
    {
        return $this->belongsTo('App\Models\Type_obj', 'from_type_obj', 'type_id');
    }
    //************************** Отношение к одному опасному событию *********************************************
    public function matrix_to_events()
    {
        return $this->belongsTo('App\Models\Matrix\Event_types', 'from_tech_event_type', 'id');
    }
    //************************** Отношение события к параметрам *********************************************
    public function event_to_param()
    {
        return $this->hasMany('App\Models\Matrix\DiagnEvent', 'from_dangerous_event', 'id');
    }
}
