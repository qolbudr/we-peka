<?php

namespace App\Http\Controllers;

use App\Enums\EvaluationCriteriaCategory;
use App\Models\EvaluationCriteria;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class EvaluationCriteriaController extends Controller
{
    public function index()
    {
        $criterias = EvaluationCriteria::with('quiz')->orderBy('created_at', 'desc')->get();
        $quizzes = Quiz::orderBy('created_at', 'desc')->get();

        return view('admin.criteria.index', compact(['criterias', 'quizzes']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'quiz_id' => ['required', 'integer', Rule::exists('quizzes', 'id')],
            'min_score_range' => ['required', 'integer', 'min:1'],
            'max_score_range' => ['required', 'integer', 'min:1', 'gt:min_score_range'],
            'category' => ['required', new Enum(EvaluationCriteriaCategory::class)],
            'description' => ['nullable', 'string'],
        ], [
            'quiz_id.required' => 'Nama Quiz wajib diisi',
            'min_score_range.required' => 'Min Skor wajib diisi',
            'max_score_range.required' => 'Max Skor wajib diisi',
            'max_score_range.gt' => 'Skor maksimum harus lebih besar dari minimum',
        ]);

        DB::beginTransaction();
        try {
            EvaluationCriteria::create($validated);

            DB::commit();

            return redirect()->route('criteria.index')->with('message', 'Berhasil menambahkan data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal store data Evaluation Criteria" . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function update(Request $request, string $id)
    {
        $criteria = EvaluationCriteria::findOrFail($id);

        $validated = $request->validate([
            'quiz_id' => ['required', 'integer', Rule::exists('quizzes', 'id')],
            'min_score_range' => ['required', 'integer', 'min:1'],
            'max_score_range' => ['required', 'integer', 'min:1', 'gt:min_score_range'],
            'category' => ['required', new Enum(EvaluationCriteriaCategory::class)],
            'description' => ['nullable', 'string'],
        ], [
            'quiz_id.required' => 'Nama Quiz wajib diisi',
            'min_score_range.required' => 'Min Skor wajib diisi',
            'max_score_range.required' => 'Max Skor wajib diisi',
            'max_score_range.gt' => 'Skor maksimum harus lebih besar dari minimum',
        ]);

        DB::beginTransaction();
        try {
            $criteria->update($validated);

            DB::commit();

            return redirect()->route('criteria.index')->with('message', 'Berhasil mengupdate data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal update data Evaluation Criteria" . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function destroy(string $id)
    {
        $criteria = EvaluationCriteria::findOrFail($id);

        $criteria->delete();

        return redirect()->route('criteria.index')->with('message', 'Berhasil menghapus data');
    }
}
