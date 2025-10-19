<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Models\Alumni;
use App\Models\ProgramStudy;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnis = Alumni::with(['university', 'programStudy'])->orderBy('graduation_year', 'desc')->get();
        $universities = University::all();
        $programStudies = ProgramStudy::all();
        return view('admin.alumni.index', [
            'alumnis' => $alumnis,
            'universities' => $universities,
            'programStudies' => $programStudies,
        ]);
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
            'program_study_id' => ['required', 'integer', Rule::exists('program_studies', 'id')],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', new Enum(Gender::class)],
            'graduation_year' => ['required', 'integer'],
        ]);

        try {
            DB::transaction(function () use ($validated) {
                Alumni::create($validated);
            });

            return redirect()->route('alumnis.index')->with('success', 'Berhasil menambahkan data alumni');
        } catch (\Throwable $e) {
            Log::error("Gagal menyimpan data alumni: " . $e->getMessage());
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
        $alumni = Alumni::findOrFail($id);

        $validated = $request->validate([
            'university_id' => ['required', 'integer', Rule::exists('universities', 'id')],
            'program_study_id' => ['required', 'integer', Rule::exists('program_studies', 'id')],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', new Enum(Gender::class)],
            'graduation_year' => ['required', 'integer'],
        ]);

        try {
            DB::transaction(function () use ($alumni, $validated) {
                $alumni->update($validated);
            });

            return redirect()->route('alumnis.index')->with('success', 'Berhasil mengupdate data alumni');
        } catch (\Throwable $e) {
            Log::error("Gagal mengupdate data alumni: " . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumni = Alumni::findOrFail($id);

        try {
            $alumni->delete();
            return redirect()->route('alumnis.index')->with('success', 'Berhasil menghapus data alumni');
        } catch (\Throwable $e) {
            Log::error("Gagal menghapus data alumni: " . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }
}
