<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Realization extends Model
{
    protected $table = 'rtn2.realization';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'name_f', 'name_n', 'name_o', 'post', 'education', 'experiens', 'last_sert',
    ];
}
