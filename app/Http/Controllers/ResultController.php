<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Intelligence;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Tampilkan daftar hasil (admin).
     */
    public function index()
    {
        $results = Result::with(['user', 'quiz', 'intelligence'])
            ->orderByDesc('created_at')
            ->get();

        return view('admin.result.index', compact('results'));
    }

    /**
     * Hapus data hasil.
     */
    public function destroy(string $id)
    {
        $result = Result::findOrFail($id);
        $result->delete();

        return redirect()->route('result.index')->with('message', 'Berhasil menghapus data');
    }

    /**
     * Tampilkan hasil tes per user (untuk halaman hasil.blade.php).
     */
public function show($id)
{
    // 1. Ambil baris Result sampel ($result)
    $sampleResult = Result::with(['user', 'quiz'])->findOrFail($id);
    
    // 2. Ambil SEMUA baris Result yang merupakan bagian dari sesi tes yang SAMA.
    $results = Result::with(['intelligence'])
        ->where('user_id', $sampleResult->user_id)
        ->where('quiz_id', $sampleResult->quiz_id)
        ->get();

    // 3. Jika $results kosong
    if ($results->isEmpty()) {
        return view('home/hasil-multipleintelligent', ['result' => $sampleResult, 'results' => collect()]);
    }
    
    // 4. Hitung kecerdasan dominan (skor tertinggi) dari koleksi $results
    // Mengurutkan dan mengambil yang pertama (yang nilainya paling besar)
    $dominant = $results->sortByDesc('score')->first();

    // 5. Tambahkan atribut dinamis ke $sampleResult untuk Ringkasan Hasil
    // Menggunakan number_format untuk Skor Tertinggi
    $sampleResult->dominant_intelligence = $dominant->intelligence->name ?? 'Tidak diketahui';
    $sampleResult->highest_score = number_format($dominant->score ?? 0); // <-- Perbaikan Tampilan Skor

    // 6. Kirim kedua variabel
    return view('home/hasil-multipleintelligent', [
        'result' => $sampleResult, 
        'results' => $results     
    ]);
}
}
