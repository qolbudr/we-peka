<?php

namespace App\Http\Controllers;

use App\Models\QuotaMaba;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class QuotaMabaController extends Controller
{
    public function index()
    {
        $quotaMabas = QuotaMaba::with('university')->orderBy('year', 'desc')->get();
        $universities = University::orderBy('created_at', 'desc')->get();

        return view('admin.quota-maba.index', [
            'quotaMabas' => $quotaMabas,
            'universities' => $universities
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'university_id' => ['required', 'integer', Rule::exists('universities', 'id')],
            'year' => ['required', 'integer'],
            'quota' => ['required', 'integer'],
            'link' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ]);

        try {
            DB::transaction(function () use ($validated) {
                QuotaMaba::create($validated);
            });

            return redirect()->route('quota-mabas.index')->with('success', 'Berhasil membuat data');
        } catch (\Throwable $e) {
            Log::error("Gagal menyimpan data quota maba: " . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function update(Request $request, string $id)
    {
        $quotaMaba = QuotaMaba::findOrFail($id);

        $validated = $request->validate([
            'university_id' => ['required', 'integer', Rule::exists('universities', 'id')],
            'year' => ['required', 'integer'],
            'quota' => ['required', 'integer'],
            'link' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ]);

        try {
            DB::transaction(function () use ($quotaMaba, $validated) {
                $quotaMaba->update($validated);
            });

            return redirect()->route('quota-mabas.index')->with('success', 'Berhasil update data');
        } catch (\Throwable $e) {
            Log::error("Gagal mengupdate data quota maba: " . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate data.');
        }
    }

    public function destroy(string $id)
    {
        $quotaMaba = QuotaMaba::findOrFail($id);

        try {
            $quotaMaba->delete();
            return redirect()->route('quota-mabas.index')->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $e) {
            Log::error("Gagal menghapus data quota maba: " . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }
}
