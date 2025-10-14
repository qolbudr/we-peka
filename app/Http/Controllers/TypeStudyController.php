<?php

namespace App\Http\Controllers;

use App\Models\TypeStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TypeStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeStudies = TypeStudy::orderBy('created_at', 'desc')->get();

        return view('admin.type-study.index', compact('typeStudies'));
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
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255']
            ]);

            TypeStudy::create($validated);

            DB::commit();

            return redirect()->route('type-study.index')->with('success', 'Berhasil membuat data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal store data type study" . $e->getMessage());

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
        $typeStudy = TypeStudy::findOrFail($id);

        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255']
            ]);

            $typeStudy->update($validated);

            DB::commit();

            return redirect()->route('type-study.index')->with('success', 'Berhasil update data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal update data type study" . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeStudy = TypeStudy::findOrFail($id);

        $typeStudy->delete();

        return redirect()->route('type-study.index')->with('success', 'Berhasil delete data');
    }
}
