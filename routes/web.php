<?php

use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Auth;

//Групировка от бана
//Route::group(['middleware' => 'forbid-banned-user',], function () {
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', ['as' => 'gazprom', 'uses' => 'MenuController@view_menu']);   //Главная


//********************* Технологический блок ****************************************
    Route::get('/opo/{id}','OpoController@view_opo_id');  //страница опо с графиками
    Route::get('/opo/{id}/data/{db_count}', 'OpoController@get_opo_data');
    Route::get('/opo/{id}/main','OpoController@view_opo_main_shema');   // страница опо со схемой расположения елементов ОПО
    //********************* Данные ручного ввода ****************************************
    Route::resource('operational',OperationalSafetyController::class);   //ручной ввод показателя безопасности
    Route::get('/opo/{id}/main/new_safety','OpoController@new');   // cоздание новой записи
    Route::resource('ready',ReadyController::class);   //ручной ввод показателя готовности
    Route::get('/opo/{id}/main/new_ready','OpoController@new_ready');   // cоздание новой записи
    Route::resource('failure_free',FailureFreeController::class);   //ручной ввод показателя безаварийности
    Route::get('/opo/{id}/main/new_failure_free','OpoController@new_failure_free');   // cоздание новой записи


    Route::get('/opo/{id_opo?}/elem/{id_obj?}/tb/{id_tb?}', "Tb@view_elem_tb"    ); // страница поспортов и схем ТБ
    Route::get('/opo/{id_opo}/elem/{id_obj}', "ObjController@view_elem_main"    ); // страница поспортов и схем элемента ОПО
    Route::get('pdf_tech_reg/{this_elem}', 'ObjController@pdf_download')->name('pdf_tech_reg');     // скачать файл выгрузку по техрегламенту
    Route::get('/jas_full', "JasController@showJas"); // страница Журнала событий полная

    Route::get('/opo/get_db_info/15', 'OpoController@get_db_info'); //Достаем данные из базы данных для таблицы
    Route::get('/opo/get_sum/all', 'OpoController@get_sum');
    Route::post('/opo/set_check_for_opo', 'OpoController@set_check');

//****************** Документарный блок *************************************
    Route::get('/docs/glossary', ['as' => 'glossary', 'uses' => 'GlossaryControllers@showHelp']); // страница Справки
    Route::get('/docs/events', "MatrixControllers@showEvent"); // страница Возможных событий матрицы
    Route::get('/docs/koef', "MatrixControllers@showkoef"); // страница справочника коэфициетов
    Route::get('/docs/calendar_event', "MatrixControllers@show_calendar_event"); // страница справочника типов событий календаря
//****************** Предписания РТН *************************************
    Route::get('/docs/predRTN', "MatrixControllers@show_RTN_all"); // страница справочника предписаний РТН
    Route::get('/docs/predRTN/{id}/edit', "MatrixControllers@edit_RTN")->name('edit_RTN'); // редактирование предписания РТН
    Route::post('/docs/predRTN/{id}/update', "MatrixControllers@update_RTN")->name('update_RTN'); // обновление предписания РТН
    Route::get('/docs/predRTN/{id}/show', "MatrixControllers@show_RTN")->name('show_RTN'); // просмотр предписания РТН
    Route::get('/docs/predRTN/{id}/delete', "MatrixControllers@delete_RTN")->name('delete_RTN'); // удаление предписания РТН
    Route::get('/docs/predRTN/create', "MatrixControllers@create_RTN")->name('create_RTN'); // создание предписания РТН
    Route::post('/docs/predRTN/store', "MatrixControllers@store_RTN")->name('store_RTN'); // сохранение предписания РТН
//****************** Справочник ОПО *************************************
    Route::get('/docs/infoOPO', "MatrixControllers@show_OPO_all"); // страница справочника ОПО
    Route::get('/docs/infoOPO/{idOPO}/edit', "MatrixControllers@edit_OPO")->name('edit_OPO'); // редактирование
    Route::post('/docs/infoOPO/{idOPO}/update', "MatrixControllers@update_OPO")->name('update_OPO'); // обновление
    Route::get('/docs/infoOPO/{idOPO}/show', "MatrixControllers@show_OPO")->name('show_OPO'); // просмотр
    Route::get('/docs/infoOPO/{idOPO}/delete', "MatrixControllers@delete_OPO")->name('delete_OPO'); // удаление
    Route::get('/docs/infoOPO/create', "MatrixControllers@create_OPO")->name('create_OPO'); // создание
    Route::post('/docs/infoOPO/store', "MatrixControllers@store_OPO")->name('store_OPO'); // сохранение
//****************** Справочник элементов ОПО *************************************
    Route::get('/docs/infoObj', "MatrixControllers@show_Obj_all"); // страница справочника элементов ОПО
    Route::get('/docs/infoObj/{idObj}/edit', "MatrixControllers@edit_Obj")->name('edit_Obj'); // редактирование
    Route::post('/docs/infoObj/{idObj}/update', "MatrixControllers@update_Obj")->name('update_Obj'); // обновление
    Route::get('/docs/infoObj/{idObj}/show', "MatrixControllers@show_Obj")->name('show_Obj'); // просмотр
    Route::get('/docs/infoObj/{idObj}/delete', "MatrixControllers@delete_Obj")->name('delete_Obj'); // удаление
    Route::get('/docs/infoObj/create', "MatrixControllers@create_Obj")->name('create_Obj'); // создание
    Route::post('/docs/infoObj/store', "MatrixControllers@store_Obj")->name('store_Obj'); // сохранение
//****************** Справочник ТБ *************************************
    Route::get('/docs/infoTB', "MatrixControllers@show_TB_all"); // страница справочника ТБ
    Route::get('/docs/infoTB/{idOTO}/edit', "MatrixControllers@edit_TB")->name('edit_TB'); // редактирование
    Route::post('/docs/infoTB/{idOTO}/update', "MatrixControllers@update_TB")->name('update_TB'); // обновление
    Route::get('/docs/infoTB/{idOTO}/show', "MatrixControllers@show_TB")->name('show_TB'); // просмотр
    Route::get('/docs/infoTB/{idOTO}/delete', "MatrixControllers@delete_TB")->name('delete_TB'); // удаление
    Route::get('/docs/infoTB/create', "MatrixControllers@create_TB")->name('create_TB'); // создание
    Route::post('/docs/infoTB/store', "MatrixControllers@store_TB")->name('store_TB'); // сохранение

    Route::get('/docs/rtn', ['as' => 'rtn', 'uses' =>'MatrixControllers@Showrtn']); // страница справочника коэфициетов
    Route::get('/docs/reglament',['as' => 'reglament', 'uses' =>'MatrixControllers@Showregl']); // страница справочника регламентных значений
    Route::get('/docs/matrix',['as' => 'matrix', 'uses' =>'MatrixControllers@Showmatrix']); // страница справочника регламентных значений

    Route::get('docs/upload', ['as' => 'upload_form', 'uses' => 'UploadController@getForm']); //Отображение списка файлов
    Route::post('docs/upload', ['as' => 'upload_file', 'uses' => 'UploadController@upload']); // Загрузка файла на сервер
    Route::get('docs/open/{id}', ['as' => 'open_file', 'uses' => 'UploadController@open']); // Просмотр файла
    Route::get('docs/upload/delete/{id}',['as' => 'upload_delete','uses' => 'UploadController@delete']); //Удаление файла

    //****************** Для НОВОГО годового отчета  *************************************
    Route::get('/docs/rtn2', ['as' => 'rtn', 'uses' =>'ReportController@Showrtn2']); // страница нового годового отчета
    //****************** tab 1.1  *************************************
    Route::get('/docs/tab11/delete/{id}', 'ReportController@delete_row_tab11');  //Удаление строки год отчета
    Route::get('/docs/tab11/edit/{id}', 'ReportController@edit_tab11');  //Изменение строки год отчета
    Route::post('update_tab11', 'ReportController@update_tab11')->name('update_tab11'); //Обновление строки год отчета
    Route::get('/docs/tab11/new', 'ReportController@new_tab11'); //новая строка
    Route::post('/docs/tab11/save', 'ReportController@save_tab11'); //сохранить строку
    //****************** tab 2.1  *************************************
    Route::get('/docs/tab21/delete/{id}', 'ReportController@delete_row_tab21');  //Удаление строки год отчета
    Route::get('/docs/tab21/edit/{id}', 'ReportController@edit_tab21');  //Изменение строки год отчета
    Route::post('update_tab21', 'ReportController@update_tab21')->name('update_tab21'); //Обновление строки год отчета
    Route::get('/docs/tab21/new', 'ReportController@new_tab21'); //новая строка
    Route::post('/docs/tab21/save', 'ReportController@save_tab21'); //сохранить строку
    //****************** tab 2.2  *************************************
    Route::get('/docs/tab22/delete/{id}', 'ReportController@delete_row_tab22');  //Удаление строки год отчета
    Route::get('/docs/tab22/edit/{id}', 'ReportController@edit_tab22');  //Изменение строки год отчета
    Route::post('update_tab22', 'ReportController@update_tab22')->name('update_tab22'); //Обновление строки год отчета
    Route::get('/docs/tab22/new', 'ReportController@new_tab22'); //новая строка
    Route::post('/docs/tab22/save', 'ReportController@save_tab22'); //сохранить строку
    //****************** tab 2.3  *************************************
    Route::get('/docs/tab23/delete/{id}', 'ReportController@delete_row_tab23');  //Удаление строки год отчета
    Route::get('/docs/tab23/edit/{id}', 'ReportController@edit_tab23');  //Изменение строки год отчета
    Route::post('update_tab23', 'ReportController@update_tab23')->name('update_tab23'); //Обновление строки год отчета
    Route::get('/docs/tab23/new', 'ReportController@new_tab23'); //новая строка
    Route::post('/docs/tab23/save', 'ReportController@save_tab23'); //сохранить строку
    //****************** tab 3  *************************************
    Route::get('/docs/tab3/delete/{id}', 'ReportController@delete_row_tab3');  //Удаление строки год отчета
    Route::get('/docs/tab3/edit/{id}', 'ReportController@edit_tab3');  //Изменение строки год отчета
    Route::post('update_tab3', 'ReportController@update_tab3')->name('update_tab3'); //Обновление строки год отчета
    Route::get('/docs/tab3/new', 'ReportController@new_tab3'); //новая строка
    Route::post('/docs/tab3/save', 'ReportController@save_tab3'); //сохранить строку
    //****************** tab 4  *************************************
    Route::get('/docs/tab4/delete/{id}', 'ReportController@delete_row_tab4');  //Удаление строки год отчета
    Route::get('/docs/tab4/edit/{id}', 'ReportController@edit_tab4');  //Изменение строки год отчета
    Route::post('update_tab4', 'ReportController@update_tab4')->name('update_tab4'); //Обновление строки год отчета
    Route::get('/docs/tab4/new', 'ReportController@new_tab4'); //новая строка
    Route::post('/docs/tab4/save', 'ReportController@save_tab4'); //сохранить строку
    //****************** tab 5.1  *************************************
    Route::get('/docs/tab51/delete/{id}', 'ReportController@delete_row_tab51');  //Удаление строки год отчета
    Route::get('/docs/tab51/edit/{id}', 'ReportController@edit_tab51');  //Изменение строки год отчета
    Route::post('update_tab51', 'ReportController@update_tab51')->name('update_tab51'); //Обновление строки год отчета
    Route::get('/docs/tab51/new', 'ReportController@new_tab51'); //новая строка
    Route::post('/docs/tab51/save', 'ReportController@save_tab51'); //сохранить строку
    //****************** tab 5.2.1  *************************************
    Route::get('/docs/tab521/delete/{id}', 'ReportController@delete_row_tab521');  //Удаление строки год отчета
    Route::get('/docs/tab521/edit/{id}', 'ReportController@edit_tab521');  //Изменение строки год отчета
    Route::post('update_tab521', 'ReportController@update_tab521')->name('update_tab521'); //Обновление строки год отчета
    Route::get('/docs/tab521/new', 'ReportController@new_tab521'); //новая строка
    Route::post('/docs/tab521/save', 'ReportController@save_tab521'); //сохранить строку
    //****************** tab 5.3  *************************************
    Route::get('/docs/tab53/delete/{id}', 'ReportController@delete_row_tab53');  //Удаление строки год отчета
    Route::get('/docs/tab53/edit/{id}', 'ReportController@edit_tab53');  //Изменение строки год отчета
    Route::post('update_tab53', 'ReportController@update_tab53')->name('update_tab53'); //Обновление строки год отчета
    Route::get('/docs/tab53/new', 'ReportController@new_tab53'); //новая строка
    Route::post('/docs/tab53/save', 'ReportController@save_tab53'); //сохранить строку
    //****************** tab 6.1  *************************************
    Route::get('/docs/tab61/delete/{id}', 'ReportController@delete_row_tab61');  //Удаление строки год отчета
    Route::get('/docs/tab61/edit/{id}', 'ReportController@edit_tab61');  //Изменение строки год отчета
    Route::post('update_tab61', 'ReportController@update_tab61')->name('update_tab61'); //Обновление строки год отчета
    Route::get('/docs/tab61/new', 'ReportController@new_tab61'); //новая строка
    Route::post('/docs/tab61/save', 'ReportController@save_tab61'); //сохранить строку
    //****************** tab 6.2  *************************************
    Route::get('/docs/tab62/delete/{id}', 'ReportController@delete_row_tab62');  //Удаление строки год отчета
    Route::get('/docs/tab62/edit/{id}', 'ReportController@edit_tab62');  //Изменение строки год отчета
    Route::post('update_tab62', 'ReportController@update_tab62')->name('update_tab62'); //Обновление строки год отчета
    Route::get('/docs/tab62/new', 'ReportController@new_tab62'); //новая строка
    Route::post('/docs/tab62/save', 'ReportController@save_tab62'); //сохранить строку
    //****************** tab 6.3  *************************************
    Route::get('/docs/tab63/delete/{id}', 'ReportController@delete_row_tab63');  //Удаление строки год отчета
    Route::get('/docs/tab63/edit/{id}', 'ReportController@edit_tab63');  //Изменение строки год отчета
    Route::post('update_tab63', 'ReportController@update_tab63')->name('update_tab63'); //Обновление строки год отчета
    Route::get('/docs/tab63/new', 'ReportController@new_tab63'); //новая строка
    Route::post('/docs/tab63/save', 'ReportController@save_tab63'); //сохранить строку
    //****************** tab 6.4  *************************************
    Route::get('/docs/tab64/delete/{id}', 'ReportController@delete_row_tab64');  //Удаление строки год отчета
    Route::get('/docs/tab64/edit/{id}', 'ReportController@edit_tab64');  //Изменение строки год отчета
    Route::post('update_tab64', 'ReportController@update_tab64')->name('update_tab64'); //Обновление строки год отчета
    Route::get('/docs/tab64/new', 'ReportController@new_tab64'); //новая строка
    Route::post('/docs/tab64/save', 'ReportController@save_tab64'); //сохранить строку
    //****************** tab 7.1  *************************************
    Route::get('/docs/tab71/delete/{id}', 'ReportController@delete_row_tab71');  //Удаление строки год отчета
    Route::get('/docs/tab71/edit/{id}', 'ReportController@edit_tab71');  //Изменение строки год отчета
    Route::post('update_tab71', 'ReportController@update_tab71')->name('update_tab71'); //Обновление строки год отчета
    Route::get('/docs/tab71/new', 'ReportController@new_tab71'); //новая строка
    Route::post('/docs/tab71/save', 'ReportController@save_tab71'); //сохранить строку
    //****************** tab 7.2  *************************************
    Route::get('/docs/tab72/delete/{id}', 'ReportController@delete_row_tab72');  //Удаление строки год отчета
    Route::get('/docs/tab72/edit/{id}', 'ReportController@edit_tab72');  //Изменение строки год отчета
    Route::post('update_tab72', 'ReportController@update_tab72')->name('update_tab72'); //Обновление строки год отчета
    Route::get('/docs/tab72/new', 'ReportController@new_tab72'); //новая строка
    Route::post('/docs/tab72/save', 'ReportController@save_tab72'); //сохранить строку
    //****************** tab 8.1  *************************************
    Route::get('/docs/tab81/delete/{id}', 'ReportController@delete_row_tab81');  //Удаление строки год отчета
    Route::get('/docs/tab81/edit/{id}', 'ReportController@edit_tab81');  //Изменение строки год отчета
    Route::post('update_tab81', 'ReportController@update_tab81')->name('update_tab81'); //Обновление строки год отчета
    Route::get('/docs/tab81/new', 'ReportController@new_tab81'); //новая строка
    Route::post('/docs/tab81/save', 'ReportController@save_tab81'); //сохранить строку
    //****************** tab 8.2  *************************************
    Route::get('/docs/tab82/delete/{id}', 'ReportController@delete_row_tab82');  //Удаление строки год отчета
    Route::get('/docs/tab82/edit/{id}', 'ReportController@edit_tab82');  //Изменение строки год отчета
    Route::post('update_tab82', 'ReportController@update_tab82')->name('update_tab82'); //Обновление строки год отчета
    Route::get('/docs/tab82/new', 'ReportController@new_tab82'); //новая строка
    Route::post('/docs/tab82/save', 'ReportController@save_tab82'); //сохранить строку
    //****************** tab 8.3  *************************************
    Route::get('/docs/tab83/delete/{id}', 'ReportController@delete_row_tab83');  //Удаление строки год отчета
    Route::get('/docs/tab83/edit/{id}', 'ReportController@edit_tab83');  //Изменение строки год отчета
    Route::post('update_tab83', 'ReportController@update_tab83')->name('update_tab83'); //Обновление строки год отчета
    Route::get('/docs/tab83/new', 'ReportController@new_tab83'); //новая строка
    Route::post('/docs/tab83/save', 'ReportController@save_tab83'); //сохранить строку
    //****************** tab 8.4  *************************************
    Route::get('/docs/tab84/delete/{id}', 'ReportController@delete_row_tab84');  //Удаление строки год отчета
    Route::get('/docs/tab84/edit/{id}', 'ReportController@edit_tab84');  //Изменение строки год отчета
    Route::post('update_tab84', 'ReportController@update_tab84')->name('update_tab84'); //Обновление строки год отчета
    Route::get('/docs/tab84/new', 'ReportController@new_tab84'); //новая строка
    Route::post('/docs/tab84/save', 'ReportController@save_tab84'); //сохранить строку
    //****************** tab 9.1  *************************************
    Route::get('/docs/tab91/delete/{id}', 'ReportController@delete_row_tab91');  //Удаление строки год отчета
    Route::get('/docs/tab91/edit/{id}', 'ReportController@edit_tab91');  //Изменение строки год отчета
    Route::post('update_tab91', 'ReportController@update_tab91')->name('update_tab91'); //Обновление строки год отчета
    Route::get('/docs/tab91/new', 'ReportController@new_tab91'); //новая строка
    Route::post('/docs/tab91/save', 'ReportController@save_tab91'); //сохранить строку
    //****************** tab 10  *************************************
    Route::get('/docs/tab10/delete/{id}', 'ReportController@delete_row_tab10');  //Удаление строки год отчета
    Route::get('/docs/tab10/edit/{id}', 'ReportController@edit_tab10');  //Изменение строки год отчета
    Route::post('update_tab10', 'ReportController@update_tab10')->name('update_tab10'); //Обновление строки год отчета
    Route::get('/docs/tab10/new', 'ReportController@new_tab10'); //новая строка
    Route::post('/docs/tab10/save', 'ReportController@save_tab10'); //сохранить строку


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
    Route::get('docs/report5','ReportController@report5')->name('repiat_report');
    Route::get('docs/report6','ReportController@report6')->name('event_pk');

    Route::resource('form51',Form51Controller::class);
    Route::resource('form52',Form52Controller::class);
    Route::get('form52-add-table/{id}','ReportController@child_form52_table')->name('add-child-form52');
    Route::post('form52-add-table/{id}', 'ReportController@store_child_form52')->name('form52-add-table');
    Route::get('form52-change-table/{id_event}', 'ReportController@edit_table')->name('form52-change-table');
    Route::post('form52-change-table/{id_event}', 'ReportController@update_table')->name('form52-update-table');
    Route::get('form52-delete-table/{id_event}', 'ReportController@destroy_row_tab_52')->name('form52-delete-table');
    Route::resource('form5363',Form5363Controller::class);
    Route::get('form5363-add-table/{id}','ReportController@child_form5363_table')->name('add-child-form5363');
    Route::post('form5363-add-table/{id}', 'ReportController@store_child_form5363')->name('form5363-add-table');
    Route::get('form5363-change-table/{id_event}', 'ReportController@edit_table5363')->name('form5363-change-table');
    Route::post('form5363-change-table/{id_event}', 'ReportController@update_table5363')->name('form5363-update-table');
    Route::get('form5363-delete-table/{id_event}', 'ReportController@destroy_row_tab_5363')->name('form5363-delete-table');
    Route::resource('form61',Form61Controller::class);
    Route::resource('form62',Form62Controller::class);

    ///////////************** Отчеты PDF **************************************/////////////////////////
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

    ////////////******************** Отчеты XML**************************************
    Route::get('/xml', 'AdminController@xml_view'); // создание xml 15 минут
    Route::get('/xml1', 'XMLController@events'); // создание xml events
    Route::get('/xml2', 'XMLController@year'); // создание xml year
    Route::get('/xml_form52', 'XMLController@form52'); // создание xml формы 5.2
    Route::get('/xml_form51', 'XMLController@form51'); // создание xml формы 5.1
    Route::get('/xml_form61', 'XMLController@form61'); // создание xml формы 6.1
    Route::get('/xml_form62', 'XMLController@form62'); // создание xml формы 6.2
    Route::get('/xml_form5363', 'XMLController@form5363'); // создание xml формы 5.3 6.3



    //*******************************************************

    Route::get('/jas_up_chek', function () {  App\Jas::updated_check(5);})->name('trend');
    Route::get('/php', function () {        phpinfo();    });

    Route::get('/opo_day', function () {        return view('opo_day');    })->name('opo_day');
    Route::get('opo/charts/fetch-data', 'Opo_dayController@view_day')->name('opo/charts/fetch-data');
    Route::get('charts/fetch-data', 'Opo_dayController@view_day')->name('charts/fetch-data');
    // Route::get('charts/fetch-data/{id}', 'Opo_dayController@view_day')->name('charts/fetch-data/{id}');
//Route::get('charts/chart_1', function () {return view('charts/chart_1');})->name('chart_1');
    Route::get('/charts/chart_ip_opo', function () {        return view('charts/chart_ip_opo');    })->name('chart_ip_opo');





//настройка доступа по ролям и привелегиям пользователя https://laravel.demiart.ru/guide-to-roles-and-permissions/
    //  Route::group(['middleware' => 'role:admin',], function () {
    //  Route::group(['middleware' => 'role:admin',], function () {
    // Route::get('/admin', 'AdminController@log_view')->name('admin'); // Главная админка логи
    Route::get('/admin', 'AdminController@log_view')->name('admin'); // Главная админка логи
    Route::get('/admin/config_safety', 'AdminController@config_edit')->name('config_safety'); // Редактирование конфигурации безопасности
    Route::post('/admin/update_config_safety', 'AdminController@config_update')->name('update_config_safety'); // Сохранение конфигурации безопасности
    Route::get('pdf_logs', 'AdminController@pdf_logs')->name('pdf_logs')->middleware('password.confirm'); // скачать журнал логов
    Route::get('clear_logs', 'AdminController@clear_logs')->name('clear_logs')->middleware('password.confirm'); // очистить журнал логов
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
//    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'Auth\RegisterController@register');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    //  }); //'role:admin'
//}); //'forbid-banned-user'
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');




//Смена пароля
    Route::get('/change-password', 'ChangePasswordController@index')->name('changepwd');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');


//Route::group(['middleware' => ['auth']], function() {



    //----------КАЛЕНДАРЬ СОБЫТИЙ--------------//
    Route::get('/eventsCal/{opo_id}', 'EventsCalendarController@index');
    Route::post('/full-calendar/action', 'EventsCalendarController@action');
//    Route::get('/full-calendar/test', 'EventsCalendarController@test');  // Тест


    //----------------SUMCONTROLLER--------------//
    Route::get('/sumcontroller/get_tree', 'SumCheckerController@get_tree');
    Route::get('/sumcontroller/test', 'SumCheckerController@test');
    Route::get('/sumcontroller/test2', 'SumCheckerController@test_view');
    Route::get('/sumcontroller/get_choiced', 'SumCheckerController@get_choiced');
    Route::post('/sumcontroller/set_paths','SumCheckerController@set_paths');
    Route::get('/sumcontroller/cmd', 'SumCheckerController@sumchecker_cmd');
    Route::get('/sumcontroller/get_all_logs', 'SumCheckerController@get_all_logs');


});
//*******************************************
Auth::routes();
Route::get('/logout', function () {    Auth::logout();    return Redirect::to('login');});




Route::get('/search/{id_s}', function ($id_s){
    $data = [
        ['id' => 1, 'name' => 'Admin'],
        ['id' => 2, 'name' => 'Truehero'],
        ['id' => 3, 'name' => 'Truecoder'],
    ];

       return view('web.opo_shema_main', ['name' => $id_s, 'data'=>$data]);
}); // С датапикером


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


Route::get('/reports', function (){
    return view('web.docs.reports.opo_5_1');
}); // Главная xml





