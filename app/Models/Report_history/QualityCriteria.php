<?php

namespace App\Models\Report_history;

use Illuminate\Database\Eloquent\Model;

class QualityCriteria extends Model
{
    protected $table = 'reports.quality_criteria';

    public $timestamps = false;

    public $primaryKey = 'id';

    protected $fillable = [
        'name_opo', 'k1_red', 'k1_yellow', 'k1_green', 'type', 'date', 'id_in_calc',
    ];
}
