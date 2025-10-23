<?php

namespace App\Http\Controllers;

use App\Models\LkpdAnswer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LkpdAnswerController extends Controller
{
    public function index()
    {
        $lkpds = LkpdAnswer::with('user')->latest()->get();

        return view('admin.lkpd.index', compact('lkpds'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'spesifik_1' => 'required|string',
            'spesifik_2' => 'required|string',
            'spesifik_3' => 'required|string',
            'measurable_1' => 'required|string',
            'achievable_1' => 'required|string',
            'achievable_2' => 'nullable|string',
            'achievable_3' => 'nullable|string',
            'relevant_1' => 'required|string',
            'relevant_2' => 'required|string',
            'timebound_1' => 'required|string',
            'timebound_2' => 'required|string',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->lkpdAnswer()->updateOrCreate(
            ['user_id' => $user->id],
            ['answers' => $validated]
        );

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Jawaban LKPD berhasil disimpan!'
            ]);
        }

        return redirect()->back()->with('success', 'Jawaban LKPD berhasil disimpan!');
    }

    public function downloadPdf($id)
    {
        $lkpdAnswer = LkpdAnswer::with('user')->findOrFail($id);

        $pdf = Pdf::loadView('admin.lkpd.lkpd-pdf', compact('lkpdAnswer'));

        $fileName = 'LKPD_' . str_replace(' ', '_', $lkpdAnswer->user->name) . '_' . date('YmdHis') . '.pdf';

        return $pdf->download($fileName);
    }
}