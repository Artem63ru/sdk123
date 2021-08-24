<?php

namespace App\Models\Xml;

use Illuminate\Database\Eloquent\Model;

class Svr_reports extends Model
{
    protected $table = 'xml_reports.svr_events';
    public $timestamps = true;
    protected $fillable = [
        'desc_event',
        'from_obj',
        'from_opo',
        'send',
    ];
    public function svr_to_obj()
    {
        return $this->belongsTo('App\Models\Ref_obj', 'from_obj', 'idObj');
    }
}
