<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\EvaluationCriteriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntelligenceController;
use App\Http\Controllers\JobIntelligenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramStudyController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\QuotaMabaController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TypeStudyController;
use App\Http\Controllers\TypeStudyDetailController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    route::get('/topikdua', 'topik2')->name('topikdua');
});

Route::middleware('auth', 'role:guru')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

route::get('/topiksatu', function () {
    return view('home.topiksatu');
})->name('topiksatu');

Route::middleware('auth', 'role:guru')->group(function () {
    Route::prefix('quizzes')->group(function () {
        Route::resource('quiz', QuizController::class)->except(['create', 'show', 'edit']);
        Route::resource('intelligence', IntelligenceController::class)->except(['create', 'show', 'edit']);
        Route::resource('question', QuizQuestionController::class)->except(['create', 'show', 'edit']);
        Route::resource('job-intelligence', JobIntelligenceController::class)->except(['create', 'show', 'edit']);
        Route::resource('criteria', EvaluationCriteriaController::class)->except(['create', 'show', 'edit']);

        Route::get('result', [ResultController::class, 'index'])->name('result.index');
        Route::delete('result/{id}', [ResultController::class, 'destroy'])->name('result.destroy');

        Route::get('answers', [AnswersController::class, 'index'])->name('answers.index');
    });

    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('all', 'index')->name('users.index');
        Route::get('siswa', 'siswa')->name('users.siswa');
        Route::get('guru', 'guru')->name('users.guru');
    });

    Route::resource('type-study', TypeStudyController::class);
    Route::resource('study-details', TypeStudyDetailController::class);

    Route::resource('universitas', UniversityController::class);
    Route::resource('quota-mabas', QuotaMabaController::class);
    Route::resource('program-studies', ProgramStudyController::class);
    Route::resource('alumnis', AlumniController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
