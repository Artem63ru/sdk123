<?php

namespace App\Models\Report_history;

use Illuminate\Database\Eloquent\Model;

class ElementStatus_day extends Model
{
    protected $table = 'reports.element_status';

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $fillable = [
        'name_opo', 'name_obj', 'IP_obj', 'OP_pb', 'OP_tech_risk', 'OP_reg', 'date', 'id_in_day', 'type',
    ];
}
