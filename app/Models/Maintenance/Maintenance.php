<?php
namespace App\Models\Maintenance;
use Illuminate\Database\Eloquent\Model;
class Maintenance extends Model
{
    protected $table='apk_opo.maintenance';
    public $timestamps = false;
    protected $fillable = [
        'title', 'start_date', 'end_date', 'obj_id'
    ];

    public static function get_month_events_elem($start, $end, $obj_id){
        return Maintenance::where(function ($query) use ($start, $end, $obj_id){
            $query->whereBetween('end_date', [$start, $end])
                ->whereBetween('end_date', [$start, $end])
                ->where('obj_id', $obj_id);
                })->get();
    }


    public static function add_new($data){
        try{
            Maintenance::create([
                'title'=>$data['title'],
                'obj_id'=>$data['obj_id'],
                'start_date'=>$data['start_date'],
                'end_date'=>$data['end_date']]);
            return true;
        }
        catch (\Exception $e) {
            return $e;
        }
    }
}
?>

