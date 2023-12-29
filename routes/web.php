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
    return view('home');
})->name('home');

Route::view('/whatsapp-form', 'whatsapp-form')->name('whatsapp');
// routes/web.php



Route::prefix('/auth')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/login', 'AuthController@index')->name('auth.login');
    Route::post('/proses', 'AuthController@proses')->name('auth.proses');
    Route::get('/register', 'AuthController@register')->name('auth.register');
    Route::post('/registration', 'AuthController@registration')->name('auth.registration');
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');
});

// Admin Panel
Route::prefix('/admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth', 'check.role:Administrator'])
    ->group(function () {
        // dashboard
        Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
        // perencanaan
        Route::resource('/perencanaan-admin', 'PerencanaanController');
        // kepemimpinan
        Route::resource('/kepemimpinan-admin', 'KepemimpinanController');
        // supervisi
        Route::resource('/supervisi-admin', 'SupervisiController');
        // konsultan
        Route::resource('/konsultan', 'KonsultanController');
        // sekolah
        Route::resource('/sekolah', 'SekolahController');
    });


// Panel User
    Route::prefix('/user')
    ->namespace('App\Http\Controllers\User')
    ->middleware(['auth', 'check.role:Member'])
    ->group(function () {
        // Dashboard user
    Route::resource('/dashboard', 'UserController');
    // Kepemimpinan user
    Route::resource('/kepemimpinan', 'KepemimpinanController');
    // Perencanaan User
    Route::resource('/perencanaan', 'PerencanaanController');
    // Supervisi
    Route::resource('/supervisi', 'SupervisiController');
    // Hasil
    Route::resource('/hasil', 'HasilController');
    // Rekomendasi
    Route::get('/rekomendasi', 'RekomendasiController@index')->name('user.rekom');
    Route::resource('/whatsapp', 'WhatsAppController');
    Route::resource('/profile', 'ProfileController');
});

Route::prefix('/konsultan')
    ->namespace('App\Http\Controllers\Konsultan')
    ->middleware(['auth', 'check.role:Konsultan'])
    ->group(function () {
        Route::resource('/dashboard-konsultan', 'KonsultanController');
        Route::resource('/rekomendasi-perencanaan', 'PerencanaanController');
        Route::resource('/rekomendasi-kepemimpinan', 'KepemimpinanController');
        Route::resource('/rekomendasi-supervisi', 'SupervisiController');
        Route::resource('/profile-konsultan', 'ProfileController');
    });


