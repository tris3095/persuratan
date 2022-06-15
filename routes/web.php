<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\SuratController;

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
Route::middleware('prevent_back_history')->group(function(){
    Auth::routes();
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'surat'], function(){
        Route::group(['prefix' => 'masuk'], function(){
            Route::get('',[SuratController::class, 'index_masuk'])->name('surat.masuk.index');
            Route::post('',[SuratController::class, 'store_masuk'])->name('surat.masuk.create');
            Route::patch('', [SuratController::class,'update_masuk'])->name('surat.masuk.update');
            Route::delete('', [SuratController::class, 'delete_masuk'])->name('surat.masuk.delete');
            Route::get('/detaildisposisi',[SuratController::class, 'index_disposisi'])->name('surat.masuk.detaildisposisi');
            Route::post('/send',[SuratController::class, 'send'])->name('surat.masuk.send');
        });
        Route::group(['prefix' => 'keluar', 'middleware' => 'super_admin'], function(){
            Route::get('',[SuratController::class, 'index_keluar'])->name('surat.keluar.index');
            Route::post('',[SuratController::class, 'store_keluar'])->name('surat.keluar.create');
            Route::patch('', [SuratController::class,'update_keluar'])->name('surat.keluar.update');
            Route::delete('', [SuratController::class, 'delete_keluar'])->name('surat.keluar.delete');
        });
    });

    Route::group(['prefix' => 'jabatan', 'middleware' => 'super_admin'], function(){
        Route::get('',[JabatanController::class, 'index'])->name('jabatan.index');
        Route::post('',[JabatanController::class, 'store'])->name('jabatan.create');
        Route::patch('', [JabatanController::class,'update'])->name('jabatan.update');
        Route::delete('', [JabatanController::class, 'delete'])->name('jabatan.delete');
    });
    Route::group(['prefix' => 'arsip', 'middleware' => 'admin'], function(){
        Route::get('',[ArsipController::class, 'index'])->name('arsip.index');
        Route::post('',[ArsipController::class, 'store'])->name('arsip.create');
        Route::patch('', [ArsipController::class,'update'])->name('arsip.update');
        Route::delete('', [ArsipController::class, 'delete'])->name('arsip.delete');
    });
    Route::group(['prefix' => 'user', 'middleware' => 'admin'], function(){
        Route::get('',[UserController::class, 'index'])->name('user.index');
        Route::post('',[UserController::class, 'store'])->name('user.create');
        Route::patch('', [UserController::class,'update'])->name('user.update');
        Route::patch('/reset', [UserController::class, 'reset'])->name('user.reset');
        Route::delete('', [UserController::class, 'delete'])->name('user.delete');
    });
    Route::get('user/profil',[UserController::class, 'profil'])->name('user.profil');
    Route::patch('user/profil/update', [UserController::class,'update_profil'])->name('user.profil.update');
});

