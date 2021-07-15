<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Kol_vo_checking extends Model
{
    protected $table = 'rtn2.kol_vo_checking';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'kol_vo_breach', 'kol_vo_breach_nonpref', 'kol_vo_attraction',
    ];

}
