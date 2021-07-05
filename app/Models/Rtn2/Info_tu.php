<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Info_tu extends Model
{
    protected $table = 'rtn2.info_tu';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'kol_vo_tu', 'kol_vo_old_tu', 'file_tu_out', 'kol_vo_repair_tu', 'file_tu_repair',
    ];

}
