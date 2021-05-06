<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ref_opo extends Model
{
    protected $table = 'ref_opo';
    public $timestamps = true;
    public $primaryKey = 'idOPO';
    //************************** Последние 90 записей в ЖАС для конкретного ОПО *********************************************
        public function opo_to_jas()
    {
        return $this->hasMany('App\Jas', 'from_opo', 'idOPO')->orderByDesc('id')->limit(90);
//        return $this->hasMany('App\Jas', 'idOPO', 'from_opo');
    }
    //************************** Выбор элементов конкретного ОПО *********************************************
        public function opo_to_obj()
    {
        return $this->hasMany('App\Models\Ref_obj', 'idOPO', 'idOPO')->orderBy('idObj')->where('InUse', '!=', '0');
//        return $this->hasMany('App\Jas', 'idOPO', 'from_opo');
    }
    //************************** Текущее значение ИП ОПО для конкретного ОПО *********************************************
    public function opo_to_calc1()
    {
        return $this->hasMany('App\Models\Calc_ip_opo_i', 'from_opo', 'idOPO')->orderByDesc('id')->take(1);
    }
    //************************** Последние 30 значений ИП ОПО *********************************************
    public function opo_to_calc30()
    {
        return $this->hasMany('App\Models\Calc_ip_opo_i', 'from_opo', 'idOPO')->orderByDesc('id')->take(30);
    }
    //************************** Последние 60 значений ИП ОПО *********************************************
    public function opo_to_calc60()
    {
        return $this->hasMany('App\Models\Calc_ip_opo_i', 'from_opo', 'idOPO')->orderByDesc('id')->take(60);
    }
    //************************** Минимальное значение за Сутки *********************************************
    public function opo_to_calc_day_min()
    {
        return $this->hasMany('App\Models\Calc_ip_opo_i', 'from_opo', 'idOPO')->orderBy('ip_opo')
            ->where('date', '>',Carbon::now()->subHours(150) )->take(1);
    }
    //************************** Минимальное значение за месяц *********************************************
    public function opo_to_calc_months_min()
    {
        return $this->hasMany('App\Models\Calc_ip_opo_i', 'from_opo', 'idOPO')->orderBy('ip_opo')
            ->where('date', '>',Carbon::now()->subDays(30) )->take(1);
    }
    //************************** Минимальное значение за год *********************************************
    public function opo_to_calc_year_min()
    {
        return $this->hasMany('App\Models\Calc_ip_opo_i', 'from_opo', 'idOPO')->orderBy('ip_opo')
            ->where('date', '>',Carbon::now()->subYear() )->take(1);
    }

    public function opo_to_calc_day($date)
    {
        return $this->hasMany('App\Models\Calc_ip_opo_i', 'from_opo', 'idOPO')
            ->orderByDesc('id')
          //  ->where('date', '<', Carbon::now()->subHours(150) )
            ->where('date', '>',Carbon::now()->subHours(24) )
            ->get() ; //Carbon::now()->subHours(24)
    }


}
