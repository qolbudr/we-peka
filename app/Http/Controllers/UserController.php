<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.user.index', compact('users'));
    }

    public function siswa()
    {
        $siswa = User::role('siswa')->orderBy('created_at', 'desc')->get();

        return view('admin.user.siswa', compact('siswa'));
    }

    public function guru()
    {
        $guru = User::role('guru')->orderBy('created_at', 'desc')->get();

        return view('admin.user.guru', compact('guru'));
    }
}
