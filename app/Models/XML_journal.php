<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XML_journal extends Model
{
    protected $table = 'public.xml_journal';

    public $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'fullDescOPO', 'regNumOPO', 'ip_opo', 'status', 'date', 'time', 'guid',
        ];

}
