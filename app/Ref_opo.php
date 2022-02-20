<?php

namespace App;

use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Ref_opo extends Model
{
    protected $table = 'ref_opo';
    public $timestamps = false;
    public $primaryKey = 'idOPO';
    protected $fillable = [
        'descOPO', 'regNumOPO', 'dateReg', 'classHazard', 'fullDescOPO', 'flDel', 'dateMode', 'login', 'guid',
    ];
    //************************** Последние 90 записей в ЖАС для конкретного ОПО *********************************************
        public function opo_to_jas()
    {
        return $this->hasMany('App\Jas', 'from_opo', 'idOPO')->orderByDesc('id')->limit(90);
//        return $this->hasMany('App\Jas', 'idOPO', 'from_opo');
    }
    //************************** Выбор элементов конкретного ОПО *********************************************
        public function opo_to_obj()
    {
        return $this->hasMany('App\Models\Ref_obj', 'idOPO', 'idOPO')->orderBy('idObj')->where('InUse', '!=', '0')->where('status', '=', '50');
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

    //************************** Проактивный показатель ИП ОПО 30 значений *********************************************
    public function opo_to_calc_opo_pro()
    {
        return $this->hasMany('App\Models\Dynamic\Calc_OPO_Pro', 'from_opo', 'idOPO')->orderByDesc('id')
           ->take(30);

    }
    //************************** Проактивный показатель ИП ОПО 30 значений *********************************************
    public function opo_to_calc_opo_pro_in_date($date)
    {
        return $this->hasMany('App\Models\Dynamic\Calc_OPO_Pro', 'from_opo', 'idOPO')->orderByDesc('id')
            ->whereDate('date', '=', $date)
            ->get();

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
    //************************** Минимальное значение за период *********************************************
    public function opo_to_calc_period_min()
    {
        return $this->hasMany('App\Models\Calc_ip_opo_i', 'from_opo', 'idOPO')->orderBy('ip_opo');
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


    public function opo_sample_day()
    {
        return $this->hasMany('App\Models\Dynamic\Calc_OPO_Pro', 'from_opo', 'idOPO')
            ->orderByDesc('date')->whereRaw("forecast_period ='1 day'")->take(1);

    }

    public function opo_sample_mons()
    {
        return $this->hasMany('App\Models\Dynamic\Calc_OPO_Pro', 'from_opo', 'idOPO')
            ->orderByDesc('date')->whereRaw("forecast_period ='1 mons'")->take(1);

    }

    public function opo_sample_year()
    {
        return $this->hasMany('App\Models\Dynamic\Calc_OPO_Pro', 'from_opo', 'idOPO')
            ->orderByDesc('date')->whereRaw("forecast_period ='1 year'")->take(1);

    }
    public function opo_sample_days_60()
    {
        return $this->hasMany('App\Models\Dynamic\Calc_OPO_Pro', 'from_opo', 'idOPO')
            ->orderByDesc('date')->whereRaw("forecast_period ='1 day'")->take(60);

    }

    public function opo_sample_mons_60()
    {
        return $this->hasMany('App\Models\Dynamic\Calc_OPO_Pro', 'from_opo', 'idOPO')
            ->orderByDesc('date')->whereRaw("forecast_period ='1 mons'")->take(60);

    }

    public function opo_sample_year_60()
    {
        return $this->hasMany('App\Models\Dynamic\Calc_OPO_Pro', 'from_opo', 'idOPO')
            ->orderByDesc('date')->whereRaw("forecast_period ='1 year'")->take(60);

    }

}
