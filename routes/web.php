<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Servicios;
use App\Http\Controllers\Cliente;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RelacionController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ServiciosController;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('auth/login');
});
/*Route::get('/Servicio', function () {
    return view('Servicio.indexser');
});
Route::get('/Servicio/crears',[App\Http\Controllers\ServicioController::class, 'create'])->name('create');
*/

Route::resource('Servicios',ServiciosController::class)->middleware('auth');

Route::resource('Clientes',ClientesController::class)->middleware('auth');

Route::resource('layouts',HomeController::class)->middleware('auth');

Route::resource('/',RelacionController::class)->middleware('auth');

Auth::routes(['reset'=>false]);

Route::get('/home',[ServiciosController::class,'index'])->name('home');
Route::get('/home',[ClienteController::class,'index'])->name('home');
//Route::get('/home',[HomeController::class,'inicio'])->name('inicio');
Route::get('/relacion','App\Http\Controllers\RelacionController@index');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [ServiciosController::class, 'index'])->name('welcome');
});
Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [ClientesController::class, 'index'])->name('welcome');
});
Route::group(['middleware' => 'auth'],function(){
    Route::get('/',[HomeController::class,'index'])->name('inicio');
});
Route::group(['middleware' => 'auth'],function(){
    Route::get('relacion',[RelacionController::class,'index'])->name('inicio');
});


