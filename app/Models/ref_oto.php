<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ref_oto extends Model
{
    protected $table = 'public.ref_oto';
    public $timestamps = true;
    public $primaryKey = 'idOTO';
    public function oto_to_elem()
    {
        return $this->belongsTo('App\Ref_Obj', 'typeObj', 'typeObj');
    }
}
