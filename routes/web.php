<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\EfikasiKarirController;
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
use Illuminate\Http\Request;
use App\Http\Controllers\MultipleIntelligentController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');

    Route::middleware('auth')->group(function () {
        Route::get('/topiksatu', 'topik1')->name('topiksatu')->middleware('auth');
        Route::get('/topikdua', 'topik2')->name('topikdua')->middleware('auth');
    });
});

Route::middleware('auth')->controller(EfikasiKarirController::class)->group(function () {
    Route::get('/test-efikasikarir', 'index')->name('test-efikasikarir');
    Route::post('/submit-efikasi-karir', 'submit')->name('submit.efikasi-karir');
    Route::get('/hasil-efikasi/{result}', 'show')->name('hasil.efikasikarir');
});

Route::middleware('auth', 'role:guru')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('/home/test-multipleintelligent', [MultipleIntelligentController::class, 'index'])
    ->name('test.multiple-intelligent');
    

Route::post('/home/test-multipleintelligent/submit', [MultipleIntelligentController::class, 'submit'])
    ->name('submit.multiple-intelligent');

Route::prefix('multiple-intelligent')->group(function () {
    Route::get('/', [QuizController::class, 'showMultipleIntelligent'])->name('multiple-intelligent.show');
    Route::post('/submit', [QuizController::class, 'submitMultipleIntelligent'])->name('multiple-intelligent.submit');
    Route::get('/hasil', [MultipleIntelligentController::class, 'hasil'])->name('multiple-intelligent.hasil');
    Route::get('/hasil/{id}', [ResultController::class, 'show'])->name('multiple-intelligent.hasil.show');
});


Route::post('/hasil-efikasikarir', function (Request $request) {
    $total = 0;
    $count = 25;

    for ($i = 1; $i <= $count; $i++) {
        $total += intval($request->input("q$i"));
    }

    $avg = $total / $count;
    $score = round(($avg / 5) * 100);

    if ($score >= 85) {
        $level = "Tinggi";
        $desc = "Anda memiliki efikasi karir yang tinggi...";
    } elseif ($score >= 60) {
        $level = "Sedang";
        $desc = "Efikasi karir Anda berada pada tingkat sedang...";
    } else {
        $level = "Rendah";
        $desc = "Efikasi karir Anda tergolong rendah...";
    }

    return view('home.hasil-efikasikarir', compact('score', 'level', 'desc'));
})->name('hasil-efikasikarir');

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

    Route::prefix('academy')->group(function () {
        Route::resource('type-study', TypeStudyController::class);
        Route::resource('study-details', TypeStudyDetailController::class);

        Route::resource('universitas', UniversityController::class);
        Route::resource('quota-mabas', QuotaMabaController::class);
        Route::resource('program-studies', ProgramStudyController::class);
    });

    Route::resource('alumnis', AlumniController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
