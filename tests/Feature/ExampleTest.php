<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $id_opo=[1,2,3,4,5,6,7,8,9];





        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $key=>$value) {
            if ($value->methods()[0] == 'GET' and $value->uri()!=="livewire/livewire.js" and $value->uri()!=='livewire/livewire.js.map') {
                if ( str_contains($value->uri(), 'opo/{id}') or (str_contains($value->uri(), 'opo_params/{id}')) or (str_contains($value->uri(), 'operational_safety/opk/{id}')) ) {
                    for ($i = 1; $i < 10; $i++) {
                        $link = str_replace('{id}', $i, $value->uri());
                        $response = $this->get($link);
                        dump($link);
                        dump($response->status());
                    }
                }
//                elseif ($value->uri()==	'opo/{id_opo?}/elem/{id_obj?}/tb/{id_tb?}') {
//                    foreach ($id_opo as $opo) {
//
//
//
//                        $id_obj = DB::table('ref_obj')->where('InUse',1)->where('idOPO',$opo)->get();
//
//                        foreach ($id_obj as $obj) {
//                            $type_obj = DB::table('ref_obj')->where('InUse',1)->where('idOPO',$opo)->where('idObj', $obj->idObj)->value('typeObj');
//
//
//
//                            $id_oto = DB::table('ref_oto')->where('typeObj',$type_obj)->get();
//
//                                foreach ($id_oto as $oto) {
//                                    if ($obj->idObj!==119 and
//                                        $obj->idObj!==120 and
//                                        $obj->idObj!==122 and
//                                        $obj->idObj!==123 and
//                                        $obj->idObj!==213 and
//                                        $obj->idObj!==133 and
//                                    $obj->idObj!==134 and
//                                    $obj->idObj!==139 and
//                                    $obj->idObj!==206 and
//                                    $obj->idObj!==236 and
//                                    $obj->idObj!==138 and
//                                    $obj->idObj!==216 and
//                                    $obj->idObj!==220 and
//                                    $obj->idObj!==111 and
//                                    $obj->idObj!==116 and
//                                    $obj->idObj!==240 and
//                                    $obj->idObj!==601 and
//                                    $obj->idObj!==225 and
//                                    $obj->idObj!==611 and
//                                    $obj->idObj!==233 and
//                                    $obj->idObj!==234 and
//                                    $obj->idObj!==230 and
//                                    $obj->idObj!==302 and
//                                    $obj->idObj!==232 and
//                                    $obj->idObj!==910 and
//                                    $obj->idObj!==304 and
//                                    $obj->idObj!==305 and
//                                    $obj->idObj!==306 and
//                                    $obj->idObj!==308 and
//                                    $obj->idObj!==118 and
//                                    $obj->idObj!==239 and
//                                    $obj->idObj!==241 and
//                                    $obj->idObj!==324 and
//                                    $obj->idObj!==325 and
//                                    $obj->idObj!==321 and
//                                    $obj->idObj!==407 and
//                                    $obj->idObj!==603 and
//                                    $obj->idObj!==623 and
//                                    $obj->idObj!==613 and
//                                    $obj->idObj!==926 and
//                                    $obj->idObj!==905 ) {
//                                    $link = str_replace('{id_opo?}', $opo, $value->uri());
//                                    $link = str_replace('{id_obj?}', $obj->idObj, $link);
//                                    $link = str_replace('{id_tb?}', $oto->idOTO, $link);
//
//                                    $response = $this->get($link);
//                                    if ($response->status()!==500) {
//                                        dump($link);
//                                        dump($response->status());
//                                    }
//                                    else {
//                                        dd($link);
//                                    }
//                                    }
//                                }
//                            }
//                    }
//                }
//                elseif ($value->uri()=='opo/{id_opo}/elem/{id_obj}') {
//                    foreach ($id_opo as $opo) {
//
//
//
//                        $id_obj = DB::table('ref_obj')->where('InUse',1)->where('idOPO',$opo)->get();
//
//                        foreach ($id_obj as $obj) {
//                            if ($obj->idObj!==119
//                                and
//                                        $obj->idObj!==120
//                                        and
//                                        $obj->idObj!==122
//                                        and
//                                        $obj->idObj!==123
// and
//                                        $obj->idObj!==213
// and
//                                        $obj->idObj!==133
//                                        and
//                                    $obj->idObj!==134
// and
//                                    $obj->idObj!==139
//                                    and
//                                    $obj->idObj!==206
//                                    and
//                                    $obj->idObj!==236
// and
//                                    $obj->idObj!==138
// and
//                                    $obj->idObj!==216
// and
//                                    $obj->idObj!==220
// and
//                                    $obj->idObj!==111
// and
//                                    $obj->idObj!==116
// and
//                                    $obj->idObj!==240
// and
//                                    $obj->idObj!==601
// and
//                                    $obj->idObj!==225
// and
//                                    $obj->idObj!==611
// and
//                                    $obj->idObj!==233
// and
//                                    $obj->idObj!==234
// and
//                                    $obj->idObj!==230
// and
//                                    $obj->idObj!==302
// and
//                                    $obj->idObj!==232
// and
//                                    $obj->idObj!==910
// and
//                                    $obj->idObj!==304
// and
//                                    $obj->idObj!==305
// and
//                                    $obj->idObj!==306
// and
//                                    $obj->idObj!==308
// and
//                                    $obj->idObj!==118
// and
//                                    $obj->idObj!==239
// and
//                                    $obj->idObj!==241
// and
//                                    $obj->idObj!==324
// and
//                                    $obj->idObj!==325
// and
//                                    $obj->idObj!==321
// and
//                                    $obj->idObj!==407
// and
//                                    $obj->idObj!==603
// and
//                                    $obj->idObj!==623
// and
//                                    $obj->idObj!==613
// and
//                                    $obj->idObj!==926
// and
//                                    $obj->idObj!==905
//                                and
//                                    $obj->idObj!==399
//                                    and
//                                    $obj->idObj!==499
//                                    and
//                                    $obj->idObj!==699
//                                    and
//                                    $obj->idObj!==999
//){
//                            $link = str_replace('{id_opo}', $opo, $value->uri());
//                            $link = str_replace('{id_obj}', $obj->idObj, $link);
//                            $response = $this->get($link);
//                                    if ($response->status()!==500) {
//                                        dump($link);
//                                        dump($response->status());
//                                    }
//                                    else {
//                                        dd($link);
//                                    }}
//                        }
//                        }
//                }
//                elseif ($value->uri()=='get_charts_vals/{id_obj}') {
//                   $id_obj = DB::table('ref_obj')->where('InUse',1)->get();
//
//                        foreach ($id_obj as $obj) {
//                            if ($obj->idObj!==119
//                                and
//                                        $obj->idObj!==120
//                                        and
//                                        $obj->idObj!==122
//                                        and
//                                        $obj->idObj!==123
// and
//                                        $obj->idObj!==213
// and
//                                        $obj->idObj!==133
//                                        and
//                                    $obj->idObj!==134
// and
//                                    $obj->idObj!==139
//                                    and
//                                    $obj->idObj!==206
//                                    and
//                                    $obj->idObj!==236
// and
//                                    $obj->idObj!==138
// and
//                                    $obj->idObj!==216
// and
//                                    $obj->idObj!==220
// and
//                                    $obj->idObj!==111
// and
//                                    $obj->idObj!==116
// and
//                                    $obj->idObj!==240
// and
//                                    $obj->idObj!==601
// and
//                                    $obj->idObj!==225
// and
//                                    $obj->idObj!==611
// and
//                                    $obj->idObj!==233
// and
//                                    $obj->idObj!==234
// and
//                                    $obj->idObj!==230
// and
//                                    $obj->idObj!==302
// and
//                                    $obj->idObj!==232
// and
//                                    $obj->idObj!==910
// and
//                                    $obj->idObj!==304
// and
//                                    $obj->idObj!==305
// and
//                                    $obj->idObj!==306
// and
//                                    $obj->idObj!==308
// and
//                                    $obj->idObj!==118
// and
//                                    $obj->idObj!==239
// and
//                                    $obj->idObj!==241
// and
//                                    $obj->idObj!==324
// and
//                                    $obj->idObj!==325
// and
//                                    $obj->idObj!==321
// and
//                                    $obj->idObj!==407
// and
//                                    $obj->idObj!==603
// and
//                                    $obj->idObj!==623
// and
//                                    $obj->idObj!==613
// and
//                                    $obj->idObj!==926
// and
//                                    $obj->idObj!==905
//){
//                            $link = str_replace('{id_obj}', $obj->idObj, $value->uri());
//                            $response = $this->get($link);
//                                    if ($response->status()!==500) {
//                                        dump($link);
//                                        dump($response->status());
//                                    }
//                                    else {
//                                        dd($link);
//                                    }
//                        }
//}}
//                elseif ($value->uri()=='pdf_tech_reg/{this_elem}') {
//                    $id_obj = DB::table('ref_obj')->where('InUse',1)->get();
//
//                    foreach ($id_obj as $obj) {
//                        if (
//                            $obj->idObj>=1000
//                        ){
//                            $link = str_replace('{this_elem}', $obj->idObj, $value->uri());
//                            $response = $this->get($link);
//                            if ($response->status()!==500) {
//                                dump($link);
//                                dump($response->status());
//                            }
//                            else {
//                                dd($link);
//                            }}
//                        }
//                    }
                elseif ($value->uri()=='docs/open/{id}') {
                    $id = DB::table('images')->get();
                    foreach ($id as $opo) {
//                                    if ($obj->idObj!==119
//                                and
//                                        $obj->idObj!==120
//                                        and
//                                        $obj->idObj!==122
//                                        and
//                                        $obj->idObj!==123
// and
//                                        $obj->idObj!==213
// and
//                                        $obj->idObj!==133
//                                        and
//                                    $obj->idObj!==134
// and
//                                    $obj->idObj!==139
//                                    and
//                                    $obj->idObj!==206
//                                    and
//                                    $obj->idObj!==236
// and
//                                    $obj->idObj!==138
// and
//                                    $obj->idObj!==216
// and
//                                    $obj->idObj!==220
// and
//                                    $obj->idObj!==111
// and
//                                    $obj->idObj!==116
// and
//                                    $obj->idObj!==240
// and
//                                    $obj->idObj!==601
// and
//                                    $obj->idObj!==225
// and
//                                    $obj->idObj!==611
// and
//                                    $obj->idObj!==233
// and
//                                    $obj->idObj!==234
// and
//                                    $obj->idObj!==230
// and
//                                    $obj->idObj!==302
// and
//                                    $obj->idObj!==232
// and
//                                    $obj->idObj!==910
// and
//                                    $obj->idObj!==304
// and
//                                    $obj->idObj!==305
// and
//                                    $obj->idObj!==306
// and
//                                    $obj->idObj!==308
// and
//                                    $obj->idObj!==118
// and
//                                    $obj->idObj!==239
// and
//                                    $obj->idObj!==241
// and
//                                    $obj->idObj!==324
// and
//                                    $obj->idObj!==325
// and
//                                    $obj->idObj!==321
// and
//                                    $obj->idObj!==407
// and
//                                    $obj->idObj!==603
// and
//                                    $obj->idObj!==623
// and
//                                    $obj->idObj!==613
// and
//                                    $obj->idObj!==926
// and
//                                    $obj->idObj!==905
//){
                        $link = str_replace('{id}', $opo->id, $value->uri());
                        $response = $this->get($link);
                        if ($response->status()!==500) {
                            dump($link);
                            dump($response->status());
                        }
                        else {
                            dd($link);
                        }}
                }
//            }
                else{
                    $link = $value->uri();
                }
                $response = $this->get($link);
                dump($link);
                dump($response->status());
            }
        }
    }



}
