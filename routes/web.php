<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
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

Route::get('/dashboardadmin', function () {
    return view('admin.dashboard');
})->name('dashboardadmin')->middleware('auth','isadmin');

Route::get('/dashboardkaryawan', function () {
    return view('karyawan.dashboard');
})->name('dashboardkaryawan')->middleware('auth','iskaryawan');


Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class);
})->name('articles');

Route::get('/detect-orchid', [OrchidDetectorController::class, 'form']);
Route::post('/detect-orchid', [OrchidDetectorController::class, 'detect'])->name('detect.orchid');
Route::delete('/delete-detection-image', [OrchidDetectorController::class, 'deleteImage'])->name('detect.deleteImage');

