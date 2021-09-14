<?php

namespace App\Models;

use http\Env\Request;
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
    //************************** Значения расчетных параметров для елемента ОПО **********************************************
    public function elem_to_calc_report()
    {
        return $this->hasMany('App\Models\Calc_elem', 'from_elem', 'idObj')->orderByDesc('id');
    }
    //************************** Последнее значение расчетных параметров для елемента ОПО **********************************************
    public function elem_to_calc()
    {
        return $this->hasMany('App\Models\Calc_elem', 'from_elem', 'idObj')->orderByDesc('id')->take(1);

    }
    //************************** Последнее значение расчетных параметров 40 шт для елемента ОПО **********************************************
    public function elem_to_calc_40()
    {
        return $this->hasMany('App\Models\Calc_elem', 'from_elem', 'idObj')->orderByDesc('id')->select('ip_elem','op_m','op_r', 'op_el','date')->take(40);

    }
    //*************** Находим посление вычисления по ТБ (10 шт по количеству технологических блоков) для элемента ОПО *********************************************
    public function elem_to_calc_tb()
    {
        return $this->hasMany('App\Models\Dynamic\Calc_tb', 'from_obj', 'idObj')->orderByDesc('id')->take(100);

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

    protected $fillable = [
        'idObj', 'nameObj', 'uppg', 'InUse', 'QP1_TYPE', 'idOPO', 'descObj', 'typeObj', 'status', 'type_project',
    ];


    public function type_obj() // Отношение объекта к типу
    {
        return $this->belongsTo('App\Type_obj', 'typeObj', 'type_id');
    }
    public function ref_opo() // Отношение объекта к типу
    {
        return $this->belongsTo('App\Ref_opo', 'idOPO', 'idOPO');
    }
    public function wells_type() // Отношение объекта к типу
    {
        return $this->belongsTo('App\Wells_type', 'QP1_TYPE', 'name');
    }


}
