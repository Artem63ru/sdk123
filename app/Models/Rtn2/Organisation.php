<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $table = 'rtn2.organisation';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'name_f', 'name_n', 'name_o', 'post', 'education', 'experiens',
    ];
}
