<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_obj extends Model
{
    protected $table = 'public.ref_status_obj';
    public $timestamps = true;
    public $primaryKey = 'id';
    public function status_to_elem()
    {
        return $this->hasMany('App\Models\Ref_obj', 'status', 'id_status');
    }
}
