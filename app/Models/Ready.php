<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ready extends Model
{
    protected $table = 'apk_opo.readiness';

    public $timestamps = false;

    protected $fillable = [
        'quarter', 'year', 'q_prut', 'q_ut', 'q_opmla', 'q_pmla', 'q_oasf', 'q_asf', 'q_gfs', 'q_f_em_stock', 'q_em_stock', 'q_f_staff', 'q_staff', 'q_f_att', 'q_att',
    ];
}
