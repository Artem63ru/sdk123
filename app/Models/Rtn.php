<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rtn extends Model
{
    protected $table = 'public.rtn';

    public $timestamps = true;

    public $primaryKey = 'id';

    public function num_to_name() // Отношение  номера ОПО к его названию
    {
        return $this->belongsTo('App\Ref_opo', 'from_opo', 'idOPO');
    }

    protected $fillable = [
        'descr', 'date', 'status', 'user_create', 'from_opo', 'created_at', 'updated_at',
    ];


}
