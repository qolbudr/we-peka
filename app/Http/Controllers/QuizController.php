<?php

namespace App\Http\Controllers;

use App\Enums\QuizCategory;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Enum;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')->get();

        return view('admin.quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'category' => ['required', new Enum(QuizCategory::class)],
        ]);

        DB::beginTransaction();
        try {
            Quiz::create($validated);

            DB::commit();

            return redirect()->route('quiz.index')->with('message', 'Berhasil membuat data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal store data Quiz" . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'category' => ['required', new Enum(QuizCategory::class)],
        ]);

        DB::beginTransaction();
        try {
            $quiz = Quiz::findOrFail($id);

            $quiz->update($validated);

            DB::commit();

            return redirect()->route('quiz.index')->with('message', 'Berhasil memperbarui data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal update data Quiz: " . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz = Quiz::findOrFail($id);

        $quiz->delete();

        return redirect()->route('quiz.index')->with('message', 'data berhasil dihapus');
    }


    
}
