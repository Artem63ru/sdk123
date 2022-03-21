<?php

namespace App\Models\Matrix;

use Illuminate\Database\Eloquent\Model;

class DiagnEvent extends Model
{
    protected $table = 'scena.diagn_event';

    public $timestamps = false;

    protected $fillable = [
        'from_dangerous_event', 'from_param_all',
        'koef', 'triger',
    ];
    //************************** Отношение к одному событию *********************************************
    public function param_to_event()
    {
        return $this->belongsTo('App\Models\Matrix\DangerEvents', 'from_dangerous_event', 'id');
    }
    //***************** Отношение параметра в техрегламенте к одному событию *********************************
    public function events_param()
    {
        return $this->belongsTo('App\Models\Tech_reg\Param_all', 'from_param_all', 'id');
    }

}
