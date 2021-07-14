<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operational_safety extends Model
{
    protected $table = 'apk_opo.operational_safety';

    public $timestamps = false;

    protected $fillable = [
        'from_opo', 'o_pk', 'r_ab', 'r_bf', 'r_go', 'n_kp1', 'n_kp2', 'n_kp3', 'n_kp4', 'p_kp1', 'p_kp2', 'p_kp3', 'p_kr', 'n_ust', 'n_ist', 'p_un', 'n_k1', 'n_k2', 'n_k3', 'n_pk2_1', 'n_pk3_2', 'n_pk4_3', 'p_cproc1', 'p_cproc2', 'p_cproc3', 'p_kp', 'n_pk1', 'n_pk2', 'n_pk3', 'n_pk4', 'n_rep1', 'n_rep2', 'n_rep3', 'n_rep4', 'p_pn1', 'p_pn2', 'p_pn3', 'p_pn4', 'p_pn', 'p_kd2', 'p_kd3', 'n_rtn', 'n_kk', 'p_kd', 's_pk', 'p_pn4', 'p_pn', 'p_kd2', 'p_kd3', 'n_rtn', 'n_kk', 'p_kd', 's_pk', 's_kk', 's_rtn', 'p_vp', 'p_ok', 'g_co', 'g_pmla', 'g_asf', 'g_fs', 'g_az', 'g_staff', 'g_att', 'quarter', 'year',
    ];
}
