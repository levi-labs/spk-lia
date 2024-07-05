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


Route::controller(\App\Http\Controllers\DashboardController::class)->prefix('dashboard')->group(function () {
    Route::get('/', 'index')->name('dashboard');
});

Route::controller(\App\Http\Controllers\KriteriaController::class)->prefix('kriteria')->group(function () {
    Route::get('/', 'index')->name('kriteria.index');
    Route::get('/create', 'create')->name('kriteria.create');
    Route::post('/store', 'store')->name('kriteria.store');
    Route::get('/edit/{kriteria}', 'edit')->name('kriteria.edit');
    Route::put('/update/{kriteria}', 'update')->name('kriteria.update');
    Route::delete('/delete/{kriteria}', 'destroy')->name('kriteria.delete');
});

Route::controller(\App\Http\Controllers\KaryawanController::class)->prefix('karyawan')->group(function () {
    Route::get('/', 'index')->name('karyawan.index');
    Route::get('/create', 'create')->name('karyawan.create');
    Route::post('/store', 'store')->name('karyawan.store');
    Route::get('/edit/{karyawan}', 'edit')->name('karyawan.edit');
    Route::put('/update/{karyawan}', 'update')->name('karyawan.update');
    Route::delete('/delete/{karyawan}', 'destroy')->name('karyawan.delete');
});

Route::controller(\App\Http\Controllers\NilaiController::class)->prefix('nilai')->group(function () {
    Route::get('/', 'index')->name('nilai.index');

    Route::get('/create', 'create')->name('nilai.create');
    Route::get('/process', 'getResult')->name('nilai.process');
    Route::get('/{karyawan}', 'show')->name('nilai.show');
    Route::post('/store', 'store')->name('nilai.store');
    Route::get('/edit/{nilai}', 'edit')->name('nilai.edit');
    Route::put('/update/{nilai}', 'update')->name('nilai.update');
    Route::delete('/delete/{nilai}', 'destroy')->name('nilai.delete');
});
