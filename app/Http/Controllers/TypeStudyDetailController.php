<?php

namespace App\Http\Controllers;

use App\Enums\Level;
use App\Models\TypeStudyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class TypeStudyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeStudyDetails = TypeStudyDetail::orderBy('created_at', 'desc')->get();

        return view('admin.type-study-detail.index', compact('typeStudyDetails'));
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
            'science_specialization' => ['required', 'string'],
            'level' => ['required', new Enum(Level::class)],
            'purpose' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::transaction(function () use ($validated) {
                TypeStudyDetail::create($validated);
            });

            return redirect()->route('study-details.index')->with('success', 'Berhasil membuat data');
        } catch (\Throwable $e) {
            Log::error("Gagal store data study details: " . $e->getMessage());

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
        $typeStudyDetail = TypeStudyDetail::findOrFail($id);

        $validated = $request->validate([
            'type_study_id' => ['required', 'integer', Rule::exists('type_studies', 'id')],
            'science_specialization' => ['required', 'string'],
            'level' => ['required', new Enum(Level::class)],
            'purpose' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::transaction(function () use ($typeStudyDetail, $validated) {
                $typeStudyDetail->update($validated);
            });

            return redirect()->route('study-details.index')->with('success', 'Berhasil update data');
        } catch (\Throwable $e) {
            Log::error("Gagal update data study details: " . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal mengupdate data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeStudyDetail = TypeStudyDetail::findOrFail($id);

        try {
            $typeStudyDetail->delete();

            return redirect()->route('study-details.index')->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $e) {
            Log::error("Gagal menghapus data study details: " . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }
}
