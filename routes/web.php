<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggrekController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrchidDetectorController;
use App\Http\Controllers\HistoryInventarisController;
use App\Http\Controllers\InventarisHabisAdminController;
use App\Http\Controllers\InventarisHabisKaryawanController;
use App\Http\Controllers\InventarisTakHabisAdminController;
use App\Http\Controllers\InventarisTakHabisKaryawanController;

Route::get('/', [HomeController::class,'index']);

Route::prefix('Artikel')->group(function(){
    Route::get('/',[HomeController::class,'Artikel'])->name('Artikel.index');
    Route::get('/{id}',[HomeController::class,'Artikelshow'])->name('Artikel.show');
});

Route::prefix('products')->group(function(){
    Route::get('/',[HomeController::class,'anggreks'])->name('Product.index');
    Route::get('/{id}',[HomeController::class,'anggrekshow'])->name('Product.show');
});

Route::get('/contact', function () {
    return view('Company_Profile.contact');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
});


Route::controller(OrchidDetectorController::class)->group(function() {
    Route::get('/detect-orchid', 'form');
    Route::post('/detect-orchid', 'detect')->name('detect.orchid');
    Route::delete('/delete-detection-image', 'deleteImage')->name('detect.deleteImage');
});

Route::middleware('auth')->group(function() {

    Route::prefix('profile')->group(function(){
        Route::get('/',[ProfileController::class,'index'])->name('profile.index');
        Route::get('/edit',[ProfileController::class,'show'])->name('profile.edit');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
        Route::post('/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    });

    Route::middleware('iskaryawan')->group(function(){
        Route::get('/dashboardkaryawan', function () {
            return view('karyawan.dashboard');
        })->name('dashboardkaryawan');

        Route::prefix('habis')->group(function(){
            Route::get('/', [InventarisHabisKaryawanController::class, 'index'])->name('inventariskaryawan-habis.index');
            Route::get('/history/{inventarisHabis}', [InventarisHabisKaryawanController::class, 'showConsumableHistory'])->name('inventariskaryawan-habis.history');
            Route::get('/history', [InventarisHabisKaryawanController::class, 'showConsumableHistoryall'])->name('inventariskaryawan-habis.historyall');
            Route::get('/quick-usage/{id}', [InventarisHabisKaryawanController::class, 'showQuickUsageForm'])->name('inventariskaryawan-habis.quick-usage');
            Route::post('/quick-usage/{inventarisHabis}', [InventarisHabisKaryawanController::class, 'processQuickUsage'])->name('inventariskaryawan-habis.process-quick-usage');
        });

        Route::prefix('takhabis')->group(function(){
            Route::get('/', [InventarisTakHabisKaryawanController::class, 'index'])->name('inventariskaryawan-tak-habis.index');
            Route::get('/borrow/{inventarisTakHabis}', [InventarisTakHabisKaryawanController::class, 'borrowItemForm'])->name('inventariskaryawan-tak-habis.borrow-item');
            Route::post('/borrow/{inventarisTakHabis}', [InventarisTakHabisKaryawanController::class, 'processBorrow'])->name('inventariskaryawan-tak-habis.process-borrow');
            Route::post('/return/{inventarisTakHabis}', [InventarisTakHabisKaryawanController::class, 'returnItem'])->name('inventariskaryawan-tak-habis.return');
            Route::post('/return/{id}', [InventarisTakHabisKaryawanController::class, 'returnItem'])->name('inventariskaryawan-tak-habis.return-item');
            Route::get('/history/{inventarisTakHabis}', [InventarisTakHabisKaryawanController::class, 'showNonConsumableHistory'])->name('inventariskaryawan-tak-habis.history');
            Route::get('/history', [InventarisTakHabisKaryawanController::class, 'showNonConsumableHistoryall'])->name('inventariskaryawan-tak-habis.historyall');
        });
    });

    Route::middleware('isadmin')->group(function() {

        Route::get('/dashboardadmin', function () {
            return view('admin.dashboard');
        })->name('dashboardadmin');


        Route::resources([
            'articles' => ArticleController::class,
            'anggrek' => AnggrekController::class,
        ]);

        Route::prefix('inventaris-habis')->group(function () {
            Route::get('/history',[HistoryInventarisController::class,'indexhabis'])->name('inventaris-habis.history');
            Route::get('/', [InventarisHabisAdminController::class, 'index'])->name('inventaris.habis');
            Route::get('/create', [InventarisHabisAdminController::class, 'createHabis'])->name('inventaris-habis.create');
            Route::post('/', [InventarisHabisAdminController::class, 'storeHabis'])->name('inventaris-habis.store');
            Route::get('/{inventarisHabis}', [InventarisHabisAdminController::class, 'showHabis'])->name('inventaris-habis.show');
            Route::get('/{inventarisHabis}/edit', [InventarisHabisAdminController::class, 'editHabis'])->name('inventaris-habis.edit');
            Route::put('/{inventarisHabis}', [InventarisHabisAdminController::class, 'updateHabis'])->name('inventaris-habis.update');
            Route::delete('/{inventarisHabis}', [InventarisHabisAdminController::class, 'destroyHabis'])->name('inventaris-habis.destroy');
        });

        Route::prefix('inventaris-tak-habis')->group(function () {
            Route::get('/history',[HistoryInventarisController::class,'indextakHabis'])->name('inventaris-tak-habis.history');
            Route::get('/', [InventarisTakHabisAdminController::class, 'index'])->name('inventaris.takhabis');
            Route::get('/create', [InventarisTakHabisAdminController::class, 'createTakHabis'])->name('inventaris-tak-habis.create');
            Route::post('/', [InventarisTakHabisAdminController::class, 'storeTakHabis'])->name('inventaris-tak-habis.store');
            Route::get('/{inventarisTakHabis}', [InventarisTakHabisAdminController::class, 'showTakHabis'])->name('inventaris-tak-habis.show');
            Route::get('/{inventarisTakHabis}/edit', [InventarisTakHabisAdminController::class, 'editTakHabis'])->name('inventaris-tak-habis.edit');
            Route::put('/{inventarisTakHabis}', [InventarisTakHabisAdminController::class, 'updateTakHabis'])->name('inventaris-tak-habis.update');
            Route::delete('/{inventarisTakHabis}', [InventarisTakHabisAdminController::class, 'destroyTakHabis'])->name('inventaris-tak-habis.destroy');
        });

        Route::prefix('karyawan')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('karyawan.index');
            Route::get('/create', [UserController::class, 'create'])->name('karyawan.create');
            Route::post('/', [UserController::class, 'store'])->name('karyawan.store');
            Route::get('/{user}', [UserController::class, 'show'])->name('karyawan.show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('karyawan.edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('karyawan.update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('karyawan.destroy');
            Route::post('/{user}/reset-password', [UserController::class, 'resetPassword'])->name('karyawan.reset-password');
        });
    });
});
