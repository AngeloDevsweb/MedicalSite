<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//especialidades
Route::get('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'index']);

Route::get('/especialidades/create', [App\Http\Controllers\SpecialtyController::class, 'create']);
Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit']);
Route::post('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'sendData']);

Route::put('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update']);
Route::delete('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'destroy']);


Route::resource('medicos','App\Http\Controllers\DoctorController');
Route::resource('pacientes','App\Http\Controllers\PatientController');

//citas
Route::get('/citas', [App\Http\Controllers\CitaController::class, 'index']);
Route::get('/citas/create', [App\Http\Controllers\CitaController::class, 'create']);
Route::get('/citas/{cita}/edit', [App\Http\Controllers\CitaController::class, 'edit']);
Route::post('/citas', [App\Http\Controllers\CitaController::class, 'sendData']);

/*
Route::resource('medicos','App\Http\Controllers\DoctorController');

Route::resource('pacientes','App\Http\Controllers\PatientController');
*/

