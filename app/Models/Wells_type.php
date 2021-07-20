<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wells_type extends Model
{
    protected $table = 'public.wells_type';

    public $timestamps = true;

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        ];


}
