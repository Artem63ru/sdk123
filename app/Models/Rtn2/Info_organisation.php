<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Info_organisation extends Model
{
    protected $table = 'rtn2.info_organisation';

    public $timestamps = false;

    protected $fillable = [
        'parametr', 'value',
    ];

}
