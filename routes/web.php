<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeStudyController;
use App\Http\Controllers\TypeStudyDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth', 'role:guru')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});


route::get('/topiksatu', function () {
    return view('home.topiksatu');
})->name('topiksatu');

route::get('/topikdua', function () {
    return view('home.topikdua');
})->name('topikdua');

Route::middleware('auth', 'role:guru')->group(function () {
    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('all', 'index')->name('users.index');
        Route::get('siswa', 'siswa')->name('users.siswa');
        Route::get('guru', 'guru')->name('users.guru');
    });

    Route::resource('type-study', TypeStudyController::class);
    Route::resource('study-details', TypeStudyDetailController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
