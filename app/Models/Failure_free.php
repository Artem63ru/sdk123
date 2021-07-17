<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Failure_free extends Model
{
    protected $table = 'apk_opo.failure_free';

    public $timestamps = false;

    protected $fillable = [
        'from_opo', 'num_c1', 'num_c2', 'num_c3', 'rab', 'quarter', 'year',
    ];
}
