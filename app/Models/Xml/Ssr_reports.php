<?php

namespace App\Models\Xml;

use Illuminate\Database\Eloquent\Model;

class Ssr_reports extends Model
{
    protected $table = 'xml_reports.ssr_events';
    public $timestamps = true;
    protected $fillable = [
        'desc_event',
        'from_obj',
        'from_opo',
        'send',
    ];
    public function ssr_to_obj()
    {
        return $this->belongsTo('App\Models\Ref_obj', 'from_obj', 'idObj');
    }
}
