<?php

namespace App\Http\Controllers;

use App\Models\TypeStudy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }

    public function topik2()
    {
        $studies = TypeStudy::with([
            'typeStudyDetails',
            'universities.programStudies',
            'universities.quotaMabas',
            'universities.alumnis'
        ])->get();

        return view('home.topikdua', [
            'studies' => $studies,
        ]);
    }
}
