<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class APK_SDK extends Model
{
    protected $table = 'public.APK_SDK';
    public $timestamps = true;
    public $primaryKey = 'id_apk';
//**************** Отношение к елементам ОПО ************************************
    public function APK_to_elem()
    {
        return $this->belongsTo('App\Ref_Obj', 'idObj', 'idObj');
    }
}
