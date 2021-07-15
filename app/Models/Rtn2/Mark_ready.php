<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Mark_ready extends Model
{
    protected $table = 'rtn2.mark_ready';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'kol_vo_worker', 'result_ready', 'comment',
    ];

}
