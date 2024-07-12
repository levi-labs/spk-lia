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
    return view('auth.login');
});
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('/logout', function () {

    auth()->logout();
    return redirect()->route('login');
})->name('logout');


Route::group(['middleware' => ['auth']], function () {

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
        Route::get('/create-second', 'createSecond')->name('karyawan.create.second');
        Route::post('/store-second', 'storeSecond')->name('karyawan.store.second');
        Route::get('/edit/{karyawan}', 'edit')->name('karyawan.edit');
        Route::put('/update/{karyawan}', 'update')->name('karyawan.update');
        Route::delete('/delete/{karyawan}', 'destroy')->name('karyawan.delete');
    });

    Route::controller(\App\Http\Controllers\NilaiController::class)->prefix('nilai')->group(function () {
        Route::get('/', 'index')->name('nilai.index');
        Route::get('/ranking', 'ranking')->name('nilai.ranking');
        Route::get('/create', 'create')->name('nilai.create');
        Route::get('/process', 'getResult')->name('nilai.process');
        Route::get('/{karyawan}', 'show')->name('nilai.show');
        Route::post('/store', 'store')->name('nilai.store');
        Route::get('/edit/{nilai}', 'edit')->name('nilai.edit');
        Route::put('/update/{nilai}', 'update')->name('nilai.update');
        Route::delete('/delete/{id}', 'destroy')->name('nilai.delete');
    });

    Route::controller(\App\Http\Controllers\UserController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/create', 'create')->name('users.create');
        Route::post('/store', 'store')->name('users.store');
        Route::get('/edit/{user}', 'edit')->name('users.edit');
        Route::put('/update/{user}', 'update')->name('users.update');
        Route::delete('/delete/{user}', 'destroy')->name('users.delete');

        Route::get('/edit-password', 'editPassword')->name('users.edit-password');
        Route::put('/update-password/{id}', 'updatePassword')->name('users.update-password');
    });
});
