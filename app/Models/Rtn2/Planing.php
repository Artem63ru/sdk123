<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    protected $table = 'rtn2.planing';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'info_event', 'file_info', 'check_agreement', 'date_agreement', 'nym_agreement', 'date_end_agreement', 'isp_agreement',
    ];
}
