<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref_opo extends Model
{
    protected $table = 'ref_opo';
    public $timestamps = true;
    public $primaryKey = 'idOPO';

    public function opo_to_jas()
    {
        return $this->hasMany('App\Jas', 'from_opo', 'idOPO');
//        return $this->hasMany('App\Jas', 'idOPO', 'from_opo');
    }

}
