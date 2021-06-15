<?php

namespace App\Models\Tech_reg;

use Illuminate\Database\Eloquent\Model;

class Tech_reglament extends Model
{
    protected $table = 'tech_reg.teh_reglament';
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'min', 'max', 'koef',
    ];

    //***************** Отношение параметра в техрегламенте к таблице перечня применяемых параметров *********************************
    public function reglament_to_param()
    {
        return $this->belongsTo('App\Models\Tech_reg\Param_all', 'from_param_all', 'id');
    }
}
