<?php

namespace App\Models\Report_history;

use Illuminate\Database\Eloquent\Model;

class EventPk extends Model
{
    protected $table = 'reports.event_pk';

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $fillable = [
        'name_opo', 'level_2_all', 'level_3_all', 'level_4_all', 'level_1_all', 'level_2_ok', 'level_3_ok', 'level_4_ok', 'level_1_ok', 'opo_all', 'num_pk_1', 'num_pk_2', 'num_pk_3', 'num_pk_4', 'type', 'date', 'id_in_calc',
    ];
}
