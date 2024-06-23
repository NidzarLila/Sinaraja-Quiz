<?php

use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SoalkuisController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



Route::get('/', 'App\Http\Controllers\DashboardController@user');
Route::get('dashboard', 'App\Http\Controllers\DashboardController@index');
Route::get('materi', 'App\Http\Controllers\MateriController@index');
Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');
Route::post('/materi/update/{id}', [MateriController::class, 'update'])->name('materi.update');
Route::delete('/materi/destroy/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
Route::get('materi/{id_materi}', 'App\Http\Controllers\MateriController@show');
Route::get('soalkuis', 'App\Http\Controllers\SoalKuisController@index');
Route::post('/soal/store', [SoalkuisController::class, 'store'])->name('soal.store');
Route::get('profil', 'App\Http\Controllers\ProfilController@index');
Route::post('/profil/store', [ProfilController::class, 'store'])->name('profil.store');
Route::post('/profil/update/{id}', [ProfilController::class, 'update'])->name('profil.update');
Route::delete('/profil/destroy/{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');




