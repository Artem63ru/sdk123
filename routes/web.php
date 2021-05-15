<?php

use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Auth;

//Групировка от бана
//Route::group(['middleware' => 'forbid-banned-user',], function () {
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'MenuController@view_menu')->name('gda');   //Главная
//    Route::get('/opo/{opo}', function ($opo) {
//        return view('opo', ['opo' => $opo]);
////    })->name('opo')->middleware('auth');  // Уровень ОПО главная

    Route::get('/opo/{id}','OpoController@view_opo_id');  //страница опо с графиками
    Route::get('/opo/{id}/main','OpoController@view_opo_main_shema');   // страница опо со схемой расположения елементов ОПО
    Route::get('/opo/{id_opo?}/elem/{id_obj?}/tb/{id_tb?}', "Tb@view_elem_tb"    ); // страница поспортов и схем ТБ
    Route::get('/opo/{id_opo}/elem/{id_obj}', "ObjController@view_elem_main"    ); // страница поспортов и схем элемента ОПО
    Route::get('/glossary', "GlossaryControllers@showHelp"); // страница Справки
    Route::get('/jas_full', "JasController@showJas"); // страница Журнала событий полная


    Route::get('/opo_plan/{opo}', function ($opo) { return view('opo_plan', ['opo' => $opo]);     })->name('opo')->middleware('auth');  // Уровень ОПО план
    Route::get('/element/{elem}', function ($elem) {         return view('element', ['elem' => $elem]);     })->name('element')->middleware('auth');  // Уровень Элемента главная
    Route::get('/element/{elem_id}/oto/{oto}', function ($elem_id, $oto) {return view('oto', ['elem_id' => $elem_id, 'oto' => $oto]);})->name('oto')->middleware('auth');  // Уровень Элемента декомпозиция на ОТО
    Route::get('/ref_opo', 'ElemController@view_tu')->name('ref_opo');

    //*****************   Данные  **************************
    Route::get('charts/fetch-data/{id}', 'OpoController@view_ip_last');
    Route::get('charts/fetch-data_day/{id}', 'Opo_dayController@view_day');
    Route::get('charts/fetch-data_elem/{id_obj}', 'ObjController@calc_elem_all');          // вывод интегрального показателя элемента ОПО
    Route::get('charts/fetch-data_elem_op_m/{id_obj}', 'ObjController@calc_elem_op_m');    //вывод Обобщенного показателя по матричным сценариям
    Route::get('charts/fetch-data_elem_op_r/{id_obj}', 'ObjController@calc_elem_op_r');    //вывод Обобщенного показателя по регламентным значениям
    Route::get('charts/fetch-data_elem_op_el/{id_obj}', 'ObjController@calc_elem_op_el');    //вывод Обобщенного показателя по елементу

    //*******************************************************

    Route::get('/trend', function () {        return view('trend');    })->name('trend');
    Route::get('/php', function () {        phpinfo();    });

    Route::get('/opo_day', function () {        return view('opo_day');    })->name('opo_day');
    Route::get('opo/charts/fetch-data', 'Opo_dayController@view_day')->name('opo/charts/fetch-data');
    Route::get('charts/fetch-data', 'Opo_dayController@view_day')->name('charts/fetch-data');
   // Route::get('charts/fetch-data/{id}', 'Opo_dayController@view_day')->name('charts/fetch-data/{id}');
//Route::get('charts/chart_1', function () {return view('charts/chart_1');})->name('chart_1');
    Route::get('/charts/chart_ip_opo', function () {        return view('charts/chart_ip_opo');    })->name('chart_ip_opo');

//***************Login and prochee


  //  Route::get('/home', 'HomeController@index')->name('home');

//*********** Проба загрузки выгрузки не работает
    Route::get('user/{id}/avatar', function ($id) {
        // Find the user
        $user = User::find(1);
        // Return the image in the response with the correct MIME type
        return response()->make($user->avatar, 200, array('Content-Type' => (new finfo(FILEINFO_MIME))->buffer($user->avatar)));
    });
//*********** Проба выгрузки картинки выгрузки не работает
    Route::post('user/1', function (Request $request, $id) {
        // Get the file from the request
        $file = $request->file('image');
        // Get the contents of the file
        $contents = $file->openFile()->fread($file->getSize());
        // Store the contents to the database
        $user = App\User::find(1);
        $user->avatar = $contents;
        $user->save();
    })->name('uploaded');;

//*********** Проба ПДФ выгрузка в пдф работает https://si-dev.com/ru/blog/laravel-html-to-pdf
    Route::get('invoices/download', 'InvoiceController@download');
    Route::get('opos', 'NotesController@index')->name('opos')->middleware('password.confirm');
    Route::get('pdf', 'NotesController@pdf');

//*********** Проба загрузки выгрузки
    Route::resource('/images', 'ImageController');
    Route::get('upload', ['as' => 'upload_form', 'uses' => 'UploadController@getForm']);
    Route::post('upload', ['as' => 'upload_file', 'uses' => 'UploadController@upload']);

//настройка доступа по ролям и привелегиям пользователя https://laravel.demiart.ru/guide-to-roles-and-permissions/
  //  Route::group(['middleware' => 'role:admin',], function () {
  //  Route::group(['middleware' => 'role:admin',], function () {
       // Route::get('/admin', 'AdminController@log_view')->name('admin'); // Главная админка логи
        Route::get('/admin', 'AdminController@log_view')->name('admin'); // Главная админка логи

        Route::get('pdf_logs', 'AdminController@pdf_logs')->name('pdf_logs')->middleware('password.confirm'); // скачать журнал логов

        Route::get('reg_user', 'AdminController@reg_user')->name('reg_user')->middleware('password.confirm');
        Route::post('add_user', 'AdminController@add_user')->name('add_user');
        Route::post('update_user', 'AdminController@update_user')->name('update_user');
        Route::get('admin/delete/{id}', 'AdminController@destroy_user');  //Удаление пользователя
        Route::get('admin/edit/{id}', 'AdminController@edit_user');  //Редактирование данных пользователя

        Route::get('reg_role', 'AdminController@reg_role')->name('reg_role')->middleware('password.confirm');
        Route::post('add_role', 'AdminController@add_role')->name('add_role');
        Route::post('update_role', 'AdminController@update_role')->name('update_role');
        Route::get('admin/delete_roles/{id}', 'AdminController@destroy_role');  //Удаление пользователя
        Route::get('admin/edit_roles/{id}', 'AdminController@edit_role');  //Редактирование данных пользователя

        Route::get('admin/ban/{id}', 'AdminController@ban1_user');  //Блокировка пользователя
        Route::get('admin/unban/{id}', 'AdminController@unban_user');  //Разблокировка пользователя
        Route::get('/admin/users', 'AdminController@user_view')->name('view_user');;
        Route::get('/admin/roles', 'AdminController@role_view');
        Route::get('/admin/perm', 'AdminController@perm_view');
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');
  //  }); //'role:admin'
//}); //'forbid-banned-user'
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

//Route::get('/', 'MenuController@view_menu')->name('gda');   //Главная


//Смена пароля
Route::get('/change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');


//Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


    Route::get('/new/{id}', 'Opo_dayController@view_last');


  });
//*******************************************
Auth::routes();
Route::get('/logout', function () {    Auth::logout();    return Redirect::to('login');});


Route::get('/xml', 'AdminController@xml_view'); // Главная xml
Route::get('/search/{id_s}', function ($id_s){
       return view('web.opo_shema_main', ['name' => $id_s]);
}); // Главная xml







