<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;


use App\Http\Controllers\Admin\AdminDesaController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKecamatanController;
use App\Http\Controllers\Admin\AdminDataawalController;
use App\Http\Controllers\Admin\AdminDptController;
use App\Http\Controllers\Admin\AdminKoordinatorController;
use App\Http\Controllers\Admin\AdminProfileController;

use App\Http\Controllers\Koordinator\KoordinatorDashboardController;
use App\Http\Controllers\Koordinator\KoordinatorKecamatanController;
use App\Http\Controllers\Koordinator\KoordinatorDesaController;
use App\Http\Controllers\Koordinator\KoordinatorDataawalController;
use App\Http\Controllers\Koordinator\KoordinatorDptController;
use App\Http\Controllers\Koordinator\KoordinatorProfileController;


Route::prefix('/')->middleware('guest')->group(function () {
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('/login', 'aksilogin');
    });
});

Route::prefix('koordinator')->middleware('auth:koordinator')->group(function () {

    Route::controller(KoordinatorDashboardController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::get('/tampilGrafik', 'tampilGrafik');
    });
    Route::controller(KoordinatorKecamatanController::class)->group(function () {
        Route::get('/kecamatan', 'index');
        Route::post('/kecamatan/tambah', 'tambah');
        
    });
    Route::controller(KoordinatorDesaController::class)->group(function () {
        Route::get('/desa', 'index');
        Route::post('/desa/tambah', 'tambah');
        Route::post('/desa/uploadFile', 'uploadFile');
        Route::get('/desa/ambilDataIndex', 'ambilDataIndex');
    });
    Route::controller(KoordinatorDataawalController::class)->group(function () {
        Route::get('/data_awal', 'index');
        Route::post('/data_awal/tambah', 'tambah');
        Route::post('/data_awal/uploadFile', 'uploadFile');
        Route::get('/data_awal/indexData', 'indexData');
        Route::get('/data_awal/edit/{dataawal}', 'edit');
        Route::post('/data_awal/edit/{dataawal}', 'editAksi');
        Route::post('/data_awal/hapus/{dataawal}', 'hapus');
        Route::get('/data_awal/detail/{dataawal}', 'detail');
    });
    Route::controller(KoordinatorDptController::class)->group(function () {
        Route::get('/dpt', 'index');
        Route::get('/dpt/tambah', 'tambah');
        Route::post('/dpt/tambah', 'aksitambah');
        Route::get('/dpt/detail/{dpt}', 'detail');
        Route::get('/dpt/edit/{dpt}', 'edit');
        Route::post('/dpt/edit/{dpt}', 'aksiedit');
        Route::post('/dpt/hapus/{dpt}', 'hapus');
        Route::post('/dpt/cari', 'cari');
       
    });

    Route::controller(KoordinatorProfileController::class)->group(function () {
        Route::get('/profile', 'index');
        Route::post('/profile/edit/{koordinator}', 'edit');
        Route::get('/profile/logout', 'logout');
    });

});



Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::get('/tampilGrafik', 'tampilGrafik');
    });
    Route::controller(AdminKecamatanController::class)->group(function () {
        Route::get('/kecamatan', 'index');
        Route::post('/kecamatan/tambah', 'tambah');
        
    });
    Route::controller(AdminDesaController::class)->group(function () {
        Route::get('/desa', 'index');
        Route::post('/desa/tambah', 'tambah');
        Route::post('/desa/uploadFile', 'uploadFile');
        Route::get('/desa/ambilDataIndex', 'ambilDataIndex');
    });
    Route::controller(AdminDataawalController::class)->group(function () {
        Route::get('/data_awal', 'index');
        Route::post('/data_awal/tambah', 'tambah');
        Route::post('/data_awal/uploadFile', 'uploadFile');
        Route::get('/data_awal/indexData', 'indexData');
        Route::get('/data_awal/edit/{dataawal}', 'edit');
        Route::post('/data_awal/edit/{dataawal}', 'editAksi');
        Route::post('/data_awal/hapus/{dataawal}', 'hapus');
        Route::get('/data_awal/detail/{dataawal}', 'detail');
    });
    Route::controller(AdminDptController::class)->group(function () {
        Route::get('/dpt', 'index');
        Route::get('/dpt/tambah', 'tambah');
        Route::post('/dpt/tambah', 'aksitambah');
        Route::get('/dpt/detail/{dpt}', 'detail');
        Route::get('/dpt/edit/{dpt}', 'edit');
        Route::post('/dpt/edit/{dpt}', 'aksiedit');
        Route::post('/dpt/hapus/{dpt}', 'hapus');
        Route::post('/dpt/cari', 'cari');
       
    });
    Route::controller(AdminKoordinatorController::class)->group(function () {
        Route::get('/koordinator', 'index');
        Route::post('/koordinator/tambah', 'tambah');
        Route::post('/koordinator/edit/{koordinator}', 'edit');
        Route::post('/koordinator/hapus/{koordinator}', 'hapus');
    });
    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('/profile', 'index');
        Route::post('/profile/edit/{admin}', 'edit');
        Route::get('/profile/logout', 'logout');
    });
});