<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* este comando reemplaza todo lo que se necesita para manejo en la base de datos */
/* donde dice productos es el nombre para acceder desde el navegador */
Route::resource('productos','\App\Http\Controllers\ProductoController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('descargar-pdf/', 'App\Http\Controllers\ProductoController@generar_pdf')->name('descargar-pdf');

