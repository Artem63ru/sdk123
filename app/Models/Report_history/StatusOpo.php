<?php

namespace App\Models\Report_history;

use Illuminate\Database\Eloquent\Model;

class StatusOpo extends Model
{
    protected $table = 'reports.status_opo';

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $fillable = [
        'name_opos', 'ip_opos', 'name_elem', 'ip', 'id_in_calc', 'date', 'type',
    ];
}
