<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jas extends Model
{



    protected $table = 'public.jas';

    public $timestamps = false;

    public function jas_to_opo()
    {
        return $this->belongsTo('App\Ref_opo', 'from_opo', 'idOPO');
    }
    public function jas_to_elem()
    {
        return $this->belongsTo('App\Ref_Obj', 'from_elem_opo', 'idObj');
    }
    public function jas_to_10()
    {
        return $this->orderByDesc('id')
                    ->take(10)
                    ->get();
    }

    //
 //
}
