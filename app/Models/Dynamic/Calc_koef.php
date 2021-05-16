<?php

namespace App\Models\Dynamic;

use Illuminate\Database\Eloquent\Model;

class Calc_koef extends Model
{
    protected $table = 'public.calc_koef';
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'koef',
    ];
}
