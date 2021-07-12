<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table = 'rtn2.offers';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'offer_list', 'event',
    ];
}
