<?php

namespace App;

use App\Http\Controllers\XMLController;
use App\Models\Xml\Svr_reports;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Jas extends Model
{
    use  Sortable;

    protected $dateFormat = 'd.m.Y';

    protected $table = 'public.jas_1';

    public $timestamps = false;

    protected $fillable = [
        'check',
    ];

    public $sortable = ['id',
        'data',
        'level',
        'status',
        'name'];

    public function jas_to_opo()
    {
        return $this->belongsTo('App\Ref_opo', 'from_opo', 'idOPO');
    }
    public function jas_to_elem()
    {
        return $this->belongsTo('App\Models\Ref_obj', 'from_elem_opo', 'buildingGUID');
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





