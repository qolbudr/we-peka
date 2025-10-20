<?php

namespace App\Http\Controllers;

use App\Enums\EvaluationCriteriaCategory;
use App\Enums\QuizCategory;
use App\Models\Answers;
use App\Models\EvaluationCriteria;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EfikasiKarirController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::with('questions')->where('category', QuizCategory::EFIKASIKARIR)->get();

        $quizFirst = $quizzes->first();

        return view('efikasi-karir.test-efikasi', [
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

        $totalScore = $answers->sum();

        $criteria = EvaluationCriteria::where('quiz_id', $quizId)
            ->where('min_score_range', '<=', $totalScore)
            ->where('max_score_range', '>=', $totalScore)
            ->first();

        $category = $criteria->category instanceof EvaluationCriteriaCategory
            ? $criteria->category
            : EvaluationCriteriaCategory::tryFrom($criteria->category);

        $result = Result::create([
            'user_id' => $user->id,
            'quiz_id' => $quizId,
            'intelligence_id' => null,
            'score' => $totalScore,
            'category' => $category,
        ]);

        $validQuestionIds = QuizQuestion::where('quiz_id', $quizId)->pluck('id')->toArray();

        foreach ($answers as $questionId => $answerValue) {
            if (!in_array($questionId, $validQuestionIds)) {
                throw new \Exception("Question ID $questionId tidak valid.");
            }

            Answers::create([
                'result_id' => $result->id,
                'question_id' => $questionId,
                'answer_value' => $answerValue,
            ]);
        }

        return response()->json([
            'message' => 'Terima kasih, hasil kuesioner berhasil disimpan.',
            'redirect_url' => route('hasil.efikasikarir', ['result' => $result->id]),
        ]);
    }

    public function show(Result $result)
    {
        $criteriaList = EvaluationCriteria::where('quiz_id', $result->quiz_id)->get();

        return view('efikasi-karir.hasil-efikasi', [
            'result' => $result,
            'criteriaList' => $criteriaList,
        ]);
    }
}
