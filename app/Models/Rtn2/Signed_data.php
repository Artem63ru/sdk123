<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Signed_data extends Model
{
    protected $table = 'rtn2.signed_data';

    public $timestamps = false;

    protected $fillable = [
        'fam', 'name', 'otch', 'position', 'sign',
    ];
}
