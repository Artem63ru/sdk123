<?php

namespace App\Models\Dynamic;

use Illuminate\Database\Eloquent\Model;

class Calendar_type extends Model
{
    protected $table = 'apk_opo.calendar_event_types';
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
}
