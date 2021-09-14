<?php

namespace App\Models\Xml;

use Illuminate\Database\Eloquent\Model;

class Svr_factors extends Model
{
    protected $table = 'xml_reports.factors_svr';
    public $timestamps = false;
    protected $fillable = [
        'from_svr_id',
        'from_oto',
        'ip_tb',
        'date',
    ];
    public function svr_to_oto()
    {
        return $this->belongsTo('App\Models\Ref_oto', 'from_oto', 'idOTO');
    }
}
