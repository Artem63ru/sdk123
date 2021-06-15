<?php

namespace App\Models\Matrix;

use Illuminate\Database\Eloquent\Model;

class Event_types extends Model
{
    protected $table = 'scena.tech_event_type';

    public $timestamps = false;

    protected $fillable = [
        'name', 'from_type_obj',
    ];
}
