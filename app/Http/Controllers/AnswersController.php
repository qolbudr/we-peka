<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function index()
    {
        $answers = Answers::with(['result.user', 'result.quiz', 'question.intelligence'])->get();

        return view('admin.answers.index', compact('answers'));
    }
}
