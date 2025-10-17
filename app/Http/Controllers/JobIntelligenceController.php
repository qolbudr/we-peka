<?php

namespace App\Http\Controllers;

use App\Models\Intelligence;
use App\Models\JobIntelligence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class JobIntelligenceController extends Controller
{
    public function index()
    {
        $jobIntelligences = JobIntelligence::with('intelligence')->orderBy('created_at', 'desc')->get();
        $intelligences = Intelligence::orderByDesc('created_at')->get();

        return view('admin.job-intelligence.index', compact(['jobIntelligences', 'intelligences']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'intelligence_id' => ['required', 'integer', Rule::exists('intelligences', 'id')],
            'name' => ['required', 'string'],
        ], [
            'intelligence_id.required' => 'Intelligence wajib diisi',
            'name.required' => 'Nama job wajib diisi'
        ]);

        DB::beginTransaction();
        try {
            JobIntelligence::create($validated);

            DB::commit();

            return redirect()->route('job-intelligence.index')->with('message', 'Berhasil menambahkan data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal store data Job Intelligance" . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function update(Request $request, string $id)
    {
        $job = JobIntelligence::findOrFail($id);

        $validated = $request->validate([
            'intelligence_id' => ['required', 'integer', Rule::exists('intelligences', 'id')],
            'name' => ['required', 'string'],
        ], [
            'intelligence_id.required' => 'Intelligence wajib diisi',
            'name.required' => 'Nama job wajib diisi'
        ]);

        DB::beginTransaction();
        try {
            $job->update($validated);

            DB::commit();

            return redirect()->route('job-intelligence.index')->with('message', 'Berhasil update data');
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error("Gagal update data Job Intelligance" . $e->getMessage());

            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function destroy(string $id)
    {
        $job = JobIntelligence::findOrFail($id);

        $job->delete();

        return redirect()->route('job-intelligence.index')->with('message', 'Berhasil menghapus data');
    }
}
