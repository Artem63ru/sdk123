<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ref_oto extends Model
{
    protected $table = 'public.ref_oto';
    public $timestamps = true;
    public $primaryKey = 'idOTO';

    public function tb_to_type() // Отношение  ТБ к типу оборудования
    {
        return $this->belongsTo('App\Models\Type_obj', 'typeObj', 'type_id');
    }

    protected $fillable = [
        'idOTO', 'typeObj', 'descOTO', 'typeQuest', 'image',
    ];
}
