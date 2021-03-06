<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware' => ['auth', 'admin']], function () {
//    Route::resource('doctor', \App\Http\Controllers\DoctorController::class);
//    Route::post('doctor/{id}', [\App\Http\Controllers\DoctorController::class, 'update']);
//    Route::get('doctor/destroy/{id}', [\App\Http\Controllers\DoctorController::class, 'destroy']);
//});

Route::resource('doctor', \App\Http\Controllers\DoctorController::class);
Route::post('doctor/{id}', [\App\Http\Controllers\DoctorController::class, 'update']);
Route::get('doctor/destroy/{id}', [\App\Http\Controllers\DoctorController::class, 'destroy']);
