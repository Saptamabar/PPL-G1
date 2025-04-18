<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggrekController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\OrchidDetectorController;

Route::get('/', function () {
    $featuredProducts = [
        [
            'id' => 1,
            'name' => 'Anggrek Bulan Putih',
            'description' => 'Anggrek bulan dengan bunga putih bersih dan aroma harum.',
            'price' => 175000,
            'image' => 'orchid-1.jpg'
        ],

    ];

    return view('Company_Profile.home', ['featuredProducts' => $featuredProducts]);
});

Route::get('/about', function () {
    return view('Company_Profile.about');
});

Route::get('/products', function () {
    $products = [
        [
            'id' => 1,
            'name' => 'Anggrek Bulan Putih',
            'species' => 'Phalaenopsis amabilis',
            'price' => 175000,
            'image' => 'orchid-1.jpg',
            'is_new' => true
        ],
    ];

    return view('Company_Profile.products', ['products' => $products]);
});

Route::get('/services', function () {
    return view('Company_Profile.services');
});

Route::get('/contact', function () {
    return view('Company_Profile.contact');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboardkaryawan', function () {
    return view('karyawan.dashboard');
})->name('dashboardkaryawan')->middleware('auth','iskaryawan');


Route::middleware(['auth','isadmin'])->group(function () {
    Route::resource('articles', ArticleController::class);
})->name('articles');


Route::middleware(['auth','isadmin'])->group(function () {
    Route::resource('anggrek', AnggrekController::class);
})->name('anggrek');

Route::get('/dashboardadmin', function () {
    return view('admin.dashboard');
})->name('dashboardadmin');

Route::get('/detect-orchid', [OrchidDetectorController::class, 'form']);
Route::post('/detect-orchid', [OrchidDetectorController::class, 'detect'])->name('detect.orchid');
Route::delete('/delete-detection-image', [OrchidDetectorController::class, 'deleteImage'])->name('detect.deleteImage');

// Inventaris Habis Routes
Route::prefix('inventaris-habis')->group(function () {
    Route::get('/', [InventarisController::class, 'index'])->name('inventaris.index');
    Route::get('/create', [InventarisController::class, 'createHabis'])->name('inventaris-habis.create');
    Route::post('/', [InventarisController::class, 'storeHabis'])->name('inventaris-habis.store');
    Route::get('/{inventarisHabi}', [InventarisController::class, 'showHabis'])->name('inventaris-habis.show');
    Route::get('/{inventarisHabi}/edit', [InventarisController::class, 'editHabis'])->name('inventaris-habis.edit');
    Route::put('/{inventarisHabi}', [InventarisController::class, 'updateHabis'])->name('inventaris-habis.update');
    Route::delete('/{inventarisHabi}', [InventarisController::class, 'destroyHabis'])->name('inventaris-habis.destroy');
});

// Inventaris Tak Habis Routes
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
