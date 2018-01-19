<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => ['permission:destroy_notes']], function () {
    Route::get('notes/{id}/destroy', 'NotesController@destroy')->name('notes.destroy');
});

Route::group(['prefix' => 'admin',  'middleware' => 'permission:crear_seccion'], function()
{
    Route::get('secciones', 'SecionesController@index')->name('guardar-seccion');    
    Route::get('secciones/list', 'SecionesController@listadoSecciones')->name('listado-seccion');    
    Route::get('sub-secciones','SubSeccionController@index')->name('guardar-sub-secciones');
    Route::get('sub-secciones/{id}','SubSeccionController@listadoSubSecciones')->name('listado-sub-secciones');
    Route::get('inventarios','inventariosController@index')->name('guardar-inventarios');
    Route::get('inventarios/list','inventariosController@anyData')->name('listado-inventarios');
    Route::post('secciones/insert', 'SecionesController@store')->name('crear-seccion');
    Route::post('sub-seccion/insert', 'SubSeccionController@store')->name('crear-sub-seccion');
    Route::post('inventarios/insert', 'inventariosController@store')->name('crear-inventario');
    Route::post('inventarios/buscar', 'inventariosController@buscar')->name('buscar-inventario');

});


Route::get('/', function () {
    return view('welcome');
});

Route::get('notes', 'NotesController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



