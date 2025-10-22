<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use App\Models\Intelligence;
use Illuminate\View\View;

class MultipleIntelligentController extends Controller
{
    public function index()
    {
        // Ambil data quiz pertama kategori Multiple Intelligence
        $quizFirst = Quiz::with('questions')
            ->where('category', 'multiple_intelligence')
            ->first();

        if (!$quizFirst) {
            return abort(404, 'Kuesioner Multiple Intelligence tidak ditemukan.');
        }

        return view('home.test-multipleintelligent', compact('quizFirst'));
    }

    public function submit(Request $request)
    {
        // Di sini kamu bisa olah jawaban, untuk sekarang cukup return JSON
        return response()->json([
            'message' => 'Jawaban berhasil dikirim!',
            'redirect_url' => route('hasil-multipleintelligent')
        ]);
    }

public function hasil()
    {
        // Ambil user yang sedang login
        $userId = Auth::id(); // ✅ gunakan Auth::id() bukan auth()->id()

        // Ambil hasil terakhir user
        $result = Result::with('user', 'intelligence')
            ->where('user_id', $userId)
            ->latest()
            ->first();

        // Jika belum ada hasil
        if (!$result) {
            return redirect()->route('home')->with('error', 'Belum ada hasil tes ditemukan.');
        }

        // Ambil semua jenis kecerdasan
        $intelligences = Intelligence::with(['results' => function ($query) use ($userId, $result) {
            $query->where('user_id', $userId)
                  ->where('quiz_id', $result->quiz_id);
        }])->get();

        // Tentukan kecerdasan dominan (skor tertinggi)
        $highest = $intelligences->map(function ($i) {
            return [
                'name' => $i->name,
                'score' => $i->results->first()->score ?? 0
            ];
        })->sortByDesc('score')->first();

        $result->dominant_intelligence = $highest['name'] ?? 'Tidak diketahui';
        $result->highest_score = $highest['score'] ?? 0;

        // Kirim data ke view
        return view('home/hasil-multipleintelligent', compact('result', 'intelligences'));
    }
}
