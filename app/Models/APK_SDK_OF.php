<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class APK_SDK_OF extends Model
{
    protected $table = 'public.APK_SDK_OF';
    public $timestamps = true;
    public $primaryKey = 'id_apk';

    public function SDK_OF_to_SDK()
    {
        return $this->hasOne('App\Models\APK_SDK', 'id_apk', 'id_apk');
    }
}
