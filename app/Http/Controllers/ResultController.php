<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with(['user', 'quiz', 'intelligence'])->orderByDesc('created_at')->get();

        return view('admin.result.index', compact('results'));
    }

    public function destroy(string $id)
    {
        $result = Result::findOrFail($id);

        $result->delete();

        return redirect()->route('result.index')->with('message', 'Berhasil menghapus data');
    }
}
