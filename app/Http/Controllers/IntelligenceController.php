<?php

namespace App\Http\Controllers;

use App\Models\Intelligence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IntelligenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intelligences = Intelligence::orderBy('created_at', 'desc')->get();

        return view('admin.intelligence.index', compact('intelligences'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();
        try {
            Intelligence::create($validated);

            DB::commit();

            return redirect()->route('intelligance.index')->with('message', 'Berhasil membuat data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal store data Intelligance" . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();
        try {
            $intelligence = Intelligence::findOrFail($id);

            $intelligence->update($validated);

            DB::commit();

            return redirect()->route('intelligence.index')->with('message', 'Berhasil memperbarui data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal update data Quiz: " . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    }

    public function destroy(string $id)
    {
        $intelligence = Intelligence::findOrFail($id);

        $intelligence->delete();

        return redirect()->route('intelligence.index')->with('message', 'data berhasil dihapus');
    }
}
