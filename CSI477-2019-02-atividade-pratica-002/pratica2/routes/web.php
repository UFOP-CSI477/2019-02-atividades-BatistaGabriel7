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

// Route::group(['middleware' => 'isAdmin'], function () {
//     Route::get('admin', 'adminController@adminDashboard');
// });

use App\Http\Controllers\UserController;
use App\Subjects;
use App\Http\Controllers\AdministradorController;

Route::get('/', function () {
    $subjects = Subjects::orderBy('name')->get();
    return view('welcome', compact('subjects'));
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/administrador', function () {
            return view('administrador');
        });
        Route::get('/administrador/listaProtocolos', 'AdministradorController@listaProtocolos');
        Route::get('/administrador/registro', 'AdministradorController@registroProtocolos');
        Route::resource('protocolos', 'AdministradorController', ['except' => ['show']]);
        

    });

    Route::get('/home/protocolos', 'UserController@viewProtocol' );
    Route::get('/home/formulario', 'UserController@createRequest' );
    Route::resource('requisicao', 'UserController', ['except' => ['show']]);


});
