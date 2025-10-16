<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universities = University::with('typeStudy')->orderBy('created_at', 'desc')->get();
        
        return view('admin.universitas.index', compact('universities'));
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
            'type_study_id' => ['required', 'integer', Rule::exists('type_studies', 'id')],
            'name' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::transaction(function () use ($validated) {
                University::create($validated);
            });

            return redirect()->route('universitas.index')->with('success', 'Berhasil membuat data');
        } catch (\Throwable $e) {
            Log::error("Gagal menyimpan data universitas: " . $e->getMessage());
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
        $university = University::findOrFail($id);

        $validated = $request->validate([
            'type_study_id' => ['required', 'integer', Rule::exists('type_studies', 'id')],
            'name' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::transaction(function () use ($university, $validated) {
                $university->update($validated);
            });

            return redirect()->route('universitas.index')->with('success', 'Berhasil update data');
        } catch (\Throwable $e) {
            Log::error("Gagal mengupdate data universitas: " . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $university = University::findOrFail($id);

        try {
            $university->delete();
            return redirect()->route('universitas.index')->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $e) {
            Log::error("Gagal menghapus data universitas: " . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }
}
