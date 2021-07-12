<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Info_respons_worker extends Model
{
    protected $table = 'rtn2.info_respons_worker';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'fam', 'name', 'otch', 'education', 'experiens', 'check_resurs', 'check_system_monitoring',
    ];

}
