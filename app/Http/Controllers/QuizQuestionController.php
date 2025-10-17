<?php

namespace App\Http\Controllers;

use App\Models\Intelligence;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class QuizQuestionController extends Controller
{
    public function index()
    {
        $questions = QuizQuestion::with(['quiz', 'intelligence'])->orderBy('created_at', 'desc')->get();
        $quizzes = Quiz::orderByDesc('created_at')->get();
        $intelligences = Intelligence::orderByDesc('created_at')->get();

        return view('admin.question.index', compact(['questions', 'quizzes', 'intelligences']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => ['required', 'integer', Rule::exists('quizzes', 'id')],
            'intelligence_id' => ['nullable', 'integer', Rule::exists('intelligences', 'id')],
            'question' => ['required', 'string', 'max:255'],
        ], [
            'quiz_id.required' => 'Quiz wajib diisi',
            'question.required' => 'Question wajib diisi'
        ]);

        DB::beginTransaction();
        try {
            QuizQuestion::create($validated);

            DB::commit();

            return redirect()->route('question.index')->with('message', 'Berhasil membuat data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal store data Question" . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function update(Request $request, string $id)
    {
        $question = QuizQuestion::findOrFail($id);

        $validated = $request->validate([
            'quiz_id' => ['required', 'integer', Rule::exists('quizzes', 'id')],
            'intelligence_id' => ['nullable', 'integer', Rule::exists('intelligences', 'id')],
            'question' => ['required', 'string', 'max:255'],
        ], [
            'quiz_id.required' => 'Quiz wajib diisi',
            'question.required' => 'Question wajib diisi'
        ]);

        DB::beginTransaction();
        try {
            $question->update($validated);

            DB::commit();

            return redirect()->route('question.index')->with('message', 'Berhasil membuat data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal store data Question" . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function destroy(string $id)
    {
        $question = QuizQuestion::findOrFail($id);

        $question->delete();

        return redirect()->route('question.index')->with('message', 'data berhasil dihapus');
    }
}
