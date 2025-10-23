<?php

namespace App\Http\Controllers;

use App\Enums\QuizCategory;
use App\Models\Answers;
use App\Models\Intelligence;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultipleIntelligentController extends Controller
{
    public function index()
    {
        // Ambil semua quiz kategori Multiple Intelligence beserta pertanyaannya
        $quizzes = Quiz::with('questions')
            ->where('category', QuizCategory::MULTIPLEINTELLIGENCE)
            ->get();

        $quizFirst = $quizzes->first();

        if (!$quizFirst) {
            abort(404, 'Kuesioner Multiple Intelligence tidak ditemukan.');
        }

        return view('home.test-multipleintelligent', [
            'quizzes' => $quizzes,
            'quizFirst' => $quizFirst,
        ]);
    }

    public function submit(Request $request)
{
    $user = Auth::user();
    if (!$user) {
        return response()->json([
            'message' => 'Silakan login terlebih dahulu.'
        ], 401);
    }

    $quizId = $request->input('quiz_id');

    // ✅ Ambil jawaban dari array 'answers' yang dikirim form
    $answers = collect($request->input('answers', []))
        ->mapWithKeys(fn($value, $key) => [(int)$key => (int)$value]);

    // Validasi question_id valid
    $validQuestionIds = QuizQuestion::where('quiz_id', $quizId)->pluck('id')->toArray();

    foreach ($answers as $questionId => $answerValue) {
        if (!in_array($questionId, $validQuestionIds)) {
            throw new \Exception("Question ID $questionId tidak valid.");
        }
    }

    // Hitung skor total per kecerdasan (intelligence)
    $intelligences = Intelligence::all();
    $scores = [];

    foreach ($intelligences as $intelligence) {
        $questionIds = QuizQuestion::where('quiz_id', $quizId)
            ->where('intelligence_id', $intelligence->id)
            ->pluck('id');

        $score = $answers->only($questionIds)->sum();
        $scores[$intelligence->id] = $score;
    }

    // Simpan hasil ke tabel Result
    foreach ($scores as $intelligenceId => $score) {
        $result = Result::create([
            'user_id' => $user->id,
            'quiz_id' => $quizId,
            'intelligence_id' => $intelligenceId,
            'score' => $score,
            'category' => null,
        ]);
    }

    // Simpan jawaban ke tabel Answers
    foreach ($answers as $questionId => $answerValue) {
        Answers::create([
            'result_id' => $result->id,
            'question_id' => $questionId,
            'answer_value' => $answerValue,
        ]);
    }

    return response()->json([
        'message' => 'Terima kasih, hasil kuesioner Multiple Intelligence berhasil disimpan.',
        'redirect_url' => route('multiple-intelligent.hasil'),
    ]);
}


    public function hasil()
    {
        $userId = Auth::id();

        $latestResult = Result::where('user_id', $userId)
            ->whereHas('quiz', fn($q) => $q->where('category', QuizCategory::MULTIPLEINTELLIGENCE))
            ->latest()
            ->first();

        if (!$latestResult) {
            return redirect()->route('home')
                ->with('error', 'Belum ada hasil tes ditemukan.');
        }

        // Ambil semua hasil dari quiz yang sama
        $results = Result::with('intelligence')
            ->where('user_id', $userId)
            ->where('quiz_id', $latestResult->quiz_id)
            ->get();

        // Tentukan kecerdasan dominan
        $highest = $results->sortByDesc('score')->first();

        $dominant = $highest->intelligence->name ?? 'Tidak diketahui';
        $highestScore = $highest->score ?? 0;

        return view('home.hasil-multipleintelligent', [
            'results' => $results,
            'dominant' => $dominant,
            'highestScore' => $highestScore,
        ]);
    }
}
