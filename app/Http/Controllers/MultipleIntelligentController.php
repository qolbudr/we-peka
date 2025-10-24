<?php

namespace App\Http\Controllers;

use App\Enums\QuizCategory;
use App\Models\Answers;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MultipleIntelligentController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('questions')->where('category', QuizCategory::MULTIPLEINTELLIGENCE)->get();

        $quizFirst = $quizzes->first();

        return view('intelligence.test-intelligence', [
            'quizzes' => $quizzes,
            'quizFirst' => $quizFirst,
        ]);
    }

    public function submit(Request $request)
    {
        $user = Auth::user();
        $quizId = $request->input('quiz_id');

        $answers = collect($request->except(['_token', 'quiz_id']))
            ->mapWithKeys(fn($value, $key) => [(int)$key => (int)$value]);

        DB::beginTransaction();
        try {
            $result = Result::create([
                'user_id' => $user->id,
                'quiz_id' => $quizId,
                'category' => QuizCategory::MULTIPLEINTELLIGENCE->value,
                'score' => 0,
                'intelligence_id' => null,
            ]);

            foreach ($answers as $quizQuestionId => $score) {
                Answers::updateOrCreate(
                    ['user_id' => $user->id, 'question_id' => $quizQuestionId, 'result_id' => $result->id],
                    ['answer_value' => $score]
                );
            }

            $intelligenceScores = QuizQuestion::select('intelligence_id')
                ->selectRaw('AVG(answers.answer_value) as average_score')
                ->join('answers', 'answers.question_id', '=', 'quiz_questions.id')
                ->where('answers.result_id', $result->id)
                ->groupBy('intelligence_id')
                ->get();

            $topIntelligence = $intelligenceScores->sortByDesc('average_score')->first();

            if ($topIntelligence) {
                $result->update([
                    'intelligence_id' => $topIntelligence->intelligence_id,
                    'score' => round($topIntelligence->average_score, 2),
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Tes berhasil disubmit!',
                'redirect_url' => route('hasil.intelligence', ['result' => $result->id]),
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Gagal submit tes Multiple Intelligence: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan.'], 500);
        }
    }

    public function show()
    {
        $user = Auth::user();

        $result = Result::with('user')
            ->where('user_id', $user->id)
            ->where('category', 'multiple_intelligence')
            ->latest()
            ->first();

        $results = Result::with('intelligence.jobIntelligences')
            ->where('user_id', $user->id)
            ->where('category', 'multiple_intelligence')
            ->get();

        return view('intelligence.hasil-intelligence', [
            'result' => $result,
            'results' => $results
        ]);
    }
}
