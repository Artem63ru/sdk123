<?php

use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'MenuController@view_menu')->name('gda')->middleware('auth');   //Главная
Route::get('/opo/{opo}', function ($opo) { return view('opo', ['opo'=>$opo]); })->name('opo')->middleware('auth');  // Уровень ОПО главная
Route::get('/opo_plan/{opo}', function ($opo) { return view('opo_plan', ['opo'=>$opo]); })->name('opo')->middleware('auth');  // Уровень ОПО план
Route::get('/element/{elem}', function ($elem) { return view('element', ['elem'=>$elem]); })->name('element')->middleware('auth');  // Уровень Элемента главная
Route::get('/element/{elem_id}/oto/{oto}', function ($elem_id, $oto) { return view('oto', ['elem_id'=>$elem_id, 'oto'=>$oto]); })->name('oto')->middleware('auth');  // Уровень Элемента декомпозиция на ОТО
Route::get('/ref_opo', 'ElemController@view_tu')->name('ref_opo');

Route::get('/trend', function () {return view('trend');})->name('trend');
Route::get('/php', function () { phpinfo(); });

Route::get('/opo_day',  function () {return view('opo_day');})->name('opo_day');
Route::get('opo/charts/fetch-data', 'Opo_dayController@view_day')->name('opo/charts/fetch-data');
Route::get('charts/fetch-data', 'Opo_dayController@view_day')->name('charts/fetch-data');
//Route::get('charts/chart_1', function () {return view('charts/chart_1');})->name('chart_1');
Route::get('/charts/chart_ip_opo', function () {return view('charts/chart_ip_opo');})->name('chart_ip_opo');

//***************Login and prochee
Auth::routes();
Route::get('/logout', function(){Auth::logout(); return Redirect::to('login');});

Route::get('/home', 'HomeController@index')->name('home');

//*********** Проба загрузки выгрузки не работает
Route::get('user/{id}/avatar', function ($id) {
    // Find the user
    $user = User::find(1);
    // Return the image in the response with the correct MIME type
    return response()->make($user->avatar, 200, array( 'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($user->avatar) ));
});
//*********** Проба выгрузки картинки выгрузки не работает
Route::post('user/1', function (Request $request, $id) {
    // Get the file from the request
    $file = $request->file('image');
    // Get the contents of the file
    $contents = $file->openFile()->fread($file->getSize());
    // Store the contents to the database
    $user = App\User::find(1); $user->avatar = $contents; $user->save(); })->name('uploaded');;

//*********** Проба ПДФ выгрузка в пдф работает https://si-dev.com/ru/blog/laravel-html-to-pdf
Route::get('invoices/download', 'InvoiceController@download');
Route::get('opos', 'NotesController@index')->name('opos')->middleware('password.confirm');
Route::get('pdf', 'NotesController@pdf');

//*********** Проба загрузки выгрузки
Route::resource('/images','ImageController');
Route::get('upload',['as' => 'upload_form', 'uses' => 'UploadController@getForm']);
Route::post('upload',['as' => 'upload_file','uses' => 'UploadController@upload']);

