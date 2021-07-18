<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wells_project extends Model
{
    protected $table = 'public.wells_project';

    public $timestamps = false;

    public function Wells_to_Scena()
    {
        return $this->hasMany('App\Models\Matrix\DangerousEvent', 'from_wells_type', 'id');

    }
}
