<?php

namespace App\Models\Rtn2;

use Illuminate\Database\Eloquent\Model;

class Act_reason_accident extends Model
{
    protected $table = 'rtn2.act_reason_accident';

    public $timestamps = false;

    protected $fillable = [
        'num_opo', 'date_accept', 'info_wort_to_accept', 'fam_wort_to_accept', 'name_wort_to_accept', 'otch_wort_to_accept',
    ];

}
