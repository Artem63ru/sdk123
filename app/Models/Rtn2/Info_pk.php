<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Info_pk extends Model
{
    protected $table = 'rtn2.info_pk';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'date', 'doc',
    ];

}
