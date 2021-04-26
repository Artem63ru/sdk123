<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_obor extends Model
{
    protected $table = 'public.type_obor';

    public function tb_to_type1() // Отношение  ТБ к типу оборудования
    {
        return $this->belongsTo('App\Models\Type_obj', 'from_type_obj', 'type_id');
    }
}
