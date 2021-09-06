<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tu extends Model
{
    protected $table = 'public.tu';
    public $timestamps = true;
    public $primaryKey = 'id';
    public function tu_to_elem()
    {
        return $this->belongsTo('App\Models\Ref_Obj', 'from_el_opo', 'buildingName');
    }
}
