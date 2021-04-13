<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref_obj extends Model
{
    protected $table = 'public.ref_obj';
    public $timestamps = true;
    public $primaryKey = 'idObj';

    public function elem_to_jas()
    {
        return $this->hasMany('App\Jas', 'from_elem_opo', 'idObj');
//        return $this->hasMany('App\Jas', 'idOPO', 'from_opo');
    }
    public function elem_to_calc()
    {
        return $this->hasMany('App\Models\Calc_elem', 'from_elem', 'idObj');

    }
    public function elem_to_oto()
    {
        return $this->hasMany('App\Models\ref_oto', 'typeObj', 'typeObj');

    }
    public function elem_to_tu()
    {
        return $this->hasMany('App\Models\Tu', 'from_el_opo', 'idObj');

    }
}
