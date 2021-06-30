<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jas extends Model
{


    protected $dateFormat = 'd.m.Y';

    protected $table = 'public.jas_1';

    public $timestamps = false;

    protected $fillable = [
        'check',
    ];

    public function jas_to_opo()
    {
        return $this->belongsTo('App\Ref_opo', 'from_opo', 'idOPO');
    }
    public function jas_to_elem()
    {
        return $this->belongsTo('App\Models\Ref_obj', 'from_elem_opo', 'idObj');
    }
    public function jas_to_10()
    {
        return $this->orderByDesc('id')
                    ->take(10)
                    ->get();
    }

    public static function updated_check($id)
    {
        try {
            Jas::find($id)->update([
                'check' => 'True',
            ]);
            return True;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }




    //
 //
}





