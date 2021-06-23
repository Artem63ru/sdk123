<?php

use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Auth;

//Групировка от бана
//Route::group(['middleware' => 'forbid-banned-user',], function () {
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', ['as' => 'gazprom', 'uses' => 'MenuController@view_menu']);   //Главная
//    Route::get('/opo/{opo}', function ($opo) {
//        return view('opo', ['opo' => $opo]);
////    })->name('opo')->middleware('auth');  // Уровень ОПО главная

//********************* Технологический блок ****************************************
    Route::get('/opo/{id}','OpoController@view_opo_id');  //страница опо с графиками
    Route::get('/opo/{id}/data/{db_count}', 'OpoController@get_opo_data');
    Route::get('/opo/{id}/main','OpoController@view_opo_main_shema');   // страница опо со схемой расположения елементов ОПО
    Route::get('/opo/{id_opo?}/elem/{id_obj?}/tb/{id_tb?}', "Tb@view_elem_tb"    ); // страница поспортов и схем ТБ
    Route::get('/opo/{id_opo}/elem/{id_obj}', "ObjController@view_elem_main"    ); // страница поспортов и схем элемента ОПО
    Route::get('/jas_full', "JasController@showJas"); // страница Журнала событий полная

    Route::get('/opo/get_db_info/15', 'OpoController@get_db_info'); //Достаем данные из базы данных для таблицы
    Route::get('/opo/get_sum/all', 'OpoController@get_sum');
    Route::post('/opo/set_check_for_opo', 'OpoController@set_check');

//****************** Документарный блок *************************************
    Route::get('/docs/glossary', ['as' => 'glossary', 'uses' => 'GlossaryControllers@showHelp']); // страница Справки
    Route::get('/docs/events', "MatrixControllers@showEvent"); // страница Возможных событий матрицы
    Route::get('/docs/koef', "MatrixControllers@showkoef"); // страница справочника коэфициетов
    Route::get('/docs/rtn', ['as' => 'rtn', 'uses' =>'MatrixControllers@Showrtn']); // страница справочника коэфициетов
    Route::get('/docs/reglament',['as' => 'reglament', 'uses' =>'MatrixControllers@Showregl']); // страница справочника регламентных значений
    Route::get('/docs/matrix',['as' => 'matrix', 'uses' =>'MatrixControllers@Showmatrix']); // страница справочника регламентных значений

    Route::get('docs/upload', ['as' => 'upload_form', 'uses' => 'UploadController@getForm']); //Отображение списка файлов
    Route::post('docs/upload', ['as' => 'upload_file', 'uses' => 'UploadController@upload']); // Загрузка файла на сервер
    Route::get('docs/open/{id}', ['as' => 'open_file', 'uses' => 'UploadController@open']); // Просмотр файла
    Route::get('docs/upload/delete/{id}',['as' => 'upload_delete','uses' => 'UploadController@delete']); //Удаление файла

 //**************** Ситуационный план ***************************************************
    Route::get('/opo/{id}/plan', function ($id) { return view('web.maps.plan',['id' => $id]);}); // страница ситуационного плана ОПО


 //**************** Все остальное *******************************************************
    Route::get('/opo_plan/{opo}', function ($opo) { return view('opo_plan', ['opo' => $opo]);     })->name('opo')->middleware('auth');  // Уровень ОПО план
    Route::get('/element/{elem}', function ($elem) {         return view('element', ['elem' => $elem]);     })->name('element')->middleware('auth');  // Уровень Элемента главная
    Route::get('/element/{elem_id}/oto/{oto}', function ($elem_id, $oto) {return view('oto', ['elem_id' => $elem_id, 'oto' => $oto]);})->name('oto')->middleware('auth');  // Уровень Элемента декомпозиция на ОТО
    Route::get('/ref_opo', 'ElemController@view_tu')->name('ref_opo');
    Route::view('/tests', 'ref_opo');

    //*****************   Данные  **************************
    Route::get('charts/fetch-data/{id}', 'OpoController@view_ip_last'); //вывод текущего показателя ИП ОПО 30 последних
    Route::get('charts/fetch-data/{id}/data/{data}', 'OpoController@view_ip_last_test'); //вывод текущего показателя ИП ОПО за данную дату
    Route::get('charts/fetch-data-prognoz/{id}', 'OpoController@view_ip_pro_last'); //вывод прогнозного показателя ИП ОПО 30 последних
    Route::get('charts/fetch-data-prognoz/{id}/data/{data}', 'OpoController@view_ip_pro_date'); //вывод прогнозного показателя ИП ОПО за данную дату
    Route::get('charts/fetch-data_day/{id}', 'Opo_dayController@view_day');
    Route::get('charts/fetch-data_elem/{id_obj}', 'ObjController@calc_elem_all');          // вывод интегрального показателя элемента ОПО
    Route::get('charts/fetch-data_elem_op_m/{id_obj}', 'ObjController@calc_elem_op_m');    //вывод Обобщенного показателя по матричным сценариям
    Route::get('charts/fetch-data_elem_op_r/{id_obj}', 'ObjController@calc_elem_op_r');    //вывод Обобщенного показателя по регламентным значениям
    Route::get('charts/fetch-data_elem_op_el/{id_obj}', 'ObjController@calc_elem_op_el');    //вывод Обобщенного показателя по елементу

    //********************  Отчеты  ***********************************

    Route::get('docs/report','ReportController@report')->name('obj_status');
    Route::get('docs/report1','ReportController@report1')->name('scena_report');
    Route::get('docs/report2','ReportController@report2')->name('result_pk');
    Route::get('docs/report3','ReportController@report3')->name('violations_report');
    Route::get('docs/report4','ReportController@report4')->name('status_opo');
//    Route::get('pdf_opo', 'PdfReportController@opo_pdf')->name('pdf_opo');     // скачать отчет по ОПО
    Route::get('docs/report5','ReportController@report5')->name('repiat_report');
    Route::get('docs/report6','ReportController@report6')->name('event_pk');

    Route::get('pdf_elem', 'PdfReportController@pdf_elem')->name('pdf_elem');     // скачать отчет по элементам
    Route::get('pdf_scena', 'PdfReportController@pdf_scena')->name('pdf_scena');     // скачать отчет по сценариям
    Route::get('pdf_result_pk', 'PdfReportController@pdf_result_pk')->name('pdf_result_pk');     // скачать отчет по проверкам
    Route::get('pdf_violations_report', 'PdfReportController@pdf_violations_report')->name('pdf_violations_report');     // скачать отчет по выявленным нарушениям
    Route::get('pdf_opo', 'PdfReportController@opo_pdf')->name('pdf_opo');     // скачать отчет по ОПО
    Route::get('pdf_repair', 'PdfReportController@pdf_repair')->name('pdf_repair');     // скачать отчет о повторах несоответствия
    Route::get('pdf_event', 'PdfReportController@pdf_event')->name('pdf_event');     // скачать отчет о мероприятиях
    Route::get('pdf_effect', 'PdfReportController@pdf_effect')->name('pdf_effect');     // скачать отчет об эффективности
    Route::get('pdf_info_act', 'PdfReportController@pdf_info_act')->name('pdf_info_act');     // скачать справку о выполнении актов внутреннее
    Route::get('pdf_act_pb', 'PdfReportController@pdf_act_pb')->name('pdf_act_pb');     // скачать справку о выполнении актов надзорные организации
    Route::get('pdf_quality_criteria', 'PdfReportController@pdf_quality_criteria')->name('pdf_quality_criteria');     // скачать отчет по критериям качественной оценки
    Route::get('docs/report5','ReportController@report5')->name('repiat_report');
    Route::get('docs/report6','ReportController@report6')->name('event_pk');
    Route::get('docs/effect_pk','ReportController@report_effect')->name('effect_pk');
    Route::get('docs/info_act','ReportController@report_info_act')->name('info_act');
    Route::get('docs/act_pb','ReportController@report_act_pb')->name('act_pb');
    Route::get('docs/quality_criteria','ReportController@report_quality_criteria')->name('quality_criteria');

    Route::resource('form51',Form51Controller::class);
    Route::resource('form52',Form52Controller::class);
    Route::get('form52-add-table','Form52Controller@create_table');
    Route::post('form52-add-table', 'Form52Controller@store_table')->name('form52-add-table');
    Route::resource('form61',Form61Controller::class);
    Route::resource('form62',Form62Controller::class);
    //*******************************************************

    Route::get('/jas_up_chek', function () {  App\Jas::updated_check(5);})->name('trend');
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
    })->name('uploaded');

//*********** Проба ПДФ выгрузка в пдф работает https://si-dev.com/ru/blog/laravel-html-to-pdf
    Route::get('invoices/download', 'InvoiceController@download');
    Route::get('opos', 'NotesController@index')->name('opos')->middleware('password.confirm');
    Route::get('pdf', 'NotesController@pdf');

//*********** Проба загрузки выгрузки
    Route::resource('/images', 'ImageController');





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



    //----------КАЛЕНДАРЬ СОБЫТИЙ--------------//
    Route::get('/eventsCal/{opo_id}', 'EventsCalendarController@index');
    Route::post('/full-calendar/action', 'EventsCalendarController@action');
//    Route::get('/full-calendar/test', 'EventsCalendarController@test');  // Тест


    //----------------SUMCONTROLLER--------------//
    Route::get('/sumcontroller/get_tree', 'SumCheckerController@get_tree');
    Route::get('/sumcontroller/test', 'SumCheckerController@sumchecker_cmd');
    Route::get('/sumcontroller/test2', 'SumCheckerController@test_view');
    Route::get('/sumcontroller/get_choiced', 'SumCheckerController@get_choiced');
    Route::post('/sumcontroller/set_paths','SumCheckerController@set_paths');
    Route::get('/sumcontroller/cmd', 'SumCheckerController@sumchecker_cmd');
    Route::get('/sumcontroller/get_all_logs', 'SumCheckerController@get_all_logs');


});
//*******************************************
Auth::routes();
Route::get('/logout', function () {    Auth::logout();    return Redirect::to('login');});


Route::get('/xml', 'AdminController@xml_view'); // Главная xml
Route::get('/search/{id_s}', function ($id_s){
    $data = [
        ['id' => 1, 'name' => 'Admin'],
        ['id' => 2, 'name' => 'Truehero'],
        ['id' => 3, 'name' => 'Truecoder'],
    ];

       return view('web.opo_shema_main', ['name' => $id_s, 'data'=>$data]);
}); // С датапикером

Route::get('/reports', function (){
    return view('web.docs.reports.opo_5_1');
}); // Главная xml





