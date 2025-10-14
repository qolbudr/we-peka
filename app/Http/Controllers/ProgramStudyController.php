<?php

namespace App\Http\Controllers;

use App\Enums\Level;
use App\Models\ProgramStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ProgramStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programStudies = ProgramStudy::with('university')->orderBy('created_at', 'desc')->get();
        return view('admin.program-study.index', compact('programStudies'));
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
            'university_id' => ['required', 'integer', Rule::exists('universities', 'id')],
            'name' => ['required', 'string', 'max:255'],
            'accreditation' => ['nullable', 'string', 'max:255'],
            'level' => ['required', new Enum(Level::class)],
            'specialization' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            DB::transaction(function () use ($validated) {
                ProgramStudy::create($validated);
            });

            return redirect()->route('program-studies.index')->with('success', 'Berhasil membuat data');
        } catch (\Throwable $e) {
            Log::error("Gagal menyimpan data program studi: " . $e->getMessage());
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
    public function update(Request $request, string $id)
    {
        $programStudy = ProgramStudy::findOrFail($id);

        $validated = $request->validate([
            'university_id' => ['required', 'integer', Rule::exists('universities', 'id')],
            'name' => ['required', 'string', 'max:255'],
            'accreditation' => ['nullable', 'string', 'max:255'],
            'level' => ['required', new Enum(Level::class)],
            'specialization' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            DB::transaction(function () use ($programStudy, $validated) {
                $programStudy->update($validated);
            });

            return redirect()->route('program-studies.index')->with('success', 'Berhasil update data');
        } catch (\Throwable $e) {
            Log::error("Gagal mengupdate data program studi: " . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programStudy = ProgramStudy::findOrFail($id);

        try {
            $programStudy->delete();
            return redirect()->route('program-studies.index')->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $e) {
            Log::error("Gagal menghapus data program studi: " . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }
}
