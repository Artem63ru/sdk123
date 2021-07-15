<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Info_insurance extends Model
{
    protected $table = 'rtn2.info_insurance';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'num_polis', 'time',
    ];

}
