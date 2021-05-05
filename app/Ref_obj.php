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
    //************************ Находим посление вычисления по ТБ для элемента ОПО
    public function elem_to_calc_tb()
    {
        return $this->hasMany('App\Models\Dynamic\Calc_tb', 'from_obj', 'idObj')->orderByDesc('id')->take(10);

    }
    public function elem_to_oto()
    {
        return $this->hasMany('App\Models\ref_oto', 'typeObj', 'typeObj');

    }
    public function elem_to_tu()
    {
        return $this->hasMany('App\Models\Tu', 'from_el_opo', 'idObj');

    }
    public function obj_to_opo()   //Отношение к ОПО
    {
        return $this->belongsTo('App\Ref_opo', 'idOPO', 'idOPO');
    }
    public function obj_to_type() // Отношение к типу оборудования
    {
        return $this->belongsTo('App\Models\Type_obj', 'typeObj', 'type_id');
    }
    //**************** Отношение к журналу отклонений по АПК ************************************
    public function elem_to_APK()
    {
        return $this->hasMany('App\Models\APK_SDK', 'idObj', 'idObj');
    }
    //*************** Отношение к Статусу работы элемента *****************************
    public function obj_to_status()
    {
        return $this->belongsTo('App\Models\Status_obj', 'status', 'id_status');
    }
}
