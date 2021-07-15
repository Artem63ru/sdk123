<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class General_info extends Model
{
    protected $table = 'rtn2.general_info';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'kol_vo_building', 'kol_vo_build', 'kol_vo_operated_obj', 'kol_vo_nonoperated_obj',
    ];

}
