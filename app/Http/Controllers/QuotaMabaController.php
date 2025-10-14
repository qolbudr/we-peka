<?php

namespace App\Http\Controllers;

use App\Models\QuotaMaba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class QuotaMabaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotaMabas = QuotaMaba::with('university')->orderBy('year', 'desc')->get();

        return view('admin.quota-maba.index', compact('quotaMabas'));
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
            'year' => ['required', 'date'],
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
        $quotaMaba = QuotaMaba::findOrFail($id);

        $validated = $request->validate([
            'university_id' => ['required', 'integer', Rule::exists('universities', 'id')],
            'year' => ['required', 'date'],
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

    /**
     * Remove the specified resource from storage.
     */
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
