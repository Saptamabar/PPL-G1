<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggrekController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\OrchidDetectorController;
use App\Http\Controllers\ProfileController;

// Public Routes
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

// Authentication Routes
Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');
});

// Profile Routes
Route::prefix('profile')->group(function(){
    Route::get('/',[ProfileController::class,'index'])->name('profile.index');
    Route::get('/edit',[ProfileController::class,'show'])->name('profile.edit');
    Route::post('/editpassword',[ProfileController::class,'update'])->name('profile.update');
    Route::post('/edit',[ProfileController::class,'password'])->name('profile.password');
});

// Orchid Detection Routes
Route::controller(OrchidDetectorController::class)->group(function() {
    Route::get('/detect-orchid', 'form');
    Route::post('/detect-orchid', 'detect')->name('detect.orchid');
    Route::delete('/delete-detection-image', 'deleteImage')->name('detect.deleteImage');
});

// Authenticated Routes
Route::middleware('auth')->group(function() {
    Route::middleware('iskaryawan')->group(function(){
        Route::get('/dashboardkaryawan', function () {
            return view('karyawan.dashboard');
        })->name('dashboardkaryawan');
        Route::get('/inventaris',[InventarisController::class,'indexkaryawan'])->name('inventaris');
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
            Route::get('/', [InventarisController::class, 'index'])->name('inventaris.index');
            Route::get('/create', [InventarisController::class, 'createHabis'])->name('inventaris-habis.create');
            Route::post('/', [InventarisController::class, 'storeHabis'])->name('inventaris-habis.store');
            Route::get('/{inventarisHabi}', [InventarisController::class, 'showHabis'])->name('inventaris-habis.show');
            Route::get('/{inventarisHabi}/edit', [InventarisController::class, 'editHabis'])->name('inventaris-habis.edit');
            Route::put('/{inventarisHabi}', [InventarisController::class, 'updateHabis'])->name('inventaris-habis.update');
            Route::delete('/{inventarisHabi}', [InventarisController::class, 'destroyHabis'])->name('inventaris-habis.destroy');
        });

        Route::prefix('inventaris-tak-habis')->group(function () {
            Route::get('/create', [InventarisController::class, 'createTakHabis'])->name('inventaris-tak-habis.create');
            Route::post('/', [InventarisController::class, 'storeTakHabis'])->name('inventaris-tak-habis.store');
            Route::get('/{inventarisTakHabi}', [InventarisController::class, 'showTakHabis'])->name('inventaris-tak-habis.show');
            Route::get('/{inventarisTakHabi}/edit', [InventarisController::class, 'editTakHabis'])->name('inventaris-tak-habis.edit');
            Route::put('/{inventarisTakHabi}', [InventarisController::class, 'updateTakHabis'])->name('inventaris-tak-habis.update');
            Route::delete('/{inventarisTakHabi}', [InventarisController::class, 'destroyTakHabis'])->name('inventaris-tak-habis.destroy');
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
