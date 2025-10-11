<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }

    public function registerChoosen()
    {
        return view('auth.register-choosen');
    }

    public function registerStudent()
    {
        return view('auth.register-student');
    }

    public function registerTeacher()
    {
        return view('auth.register-teacher');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function studentStore(Request $request): RedirectResponse
    {
        if (!empty($request->phone)) {
            $raw = preg_replace('/[()\s\.\-]/', '', $request->phone);

            $normalized = preg_replace('/^(\+62|62|628)/', '08', $raw);
            $normalized = preg_replace('/^(\+62|62)8/', '08', $normalized);
            $normalized = preg_replace('/^0+8/', '08', $normalized);

            $request->merge(['phone' => $normalized]);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'regex:/^08[0-9]{8,12}$/'],
            'gender' => ['required', new Enum(Gender::class)]
        ]);

        $gender = Gender::from($request['gender']);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'gender' => $gender->value
        ]);

        $user->assignRole('siswa');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function teacherStore(Request $request): RedirectResponse
    {
        if (!empty($request->phone)) {
            $raw = preg_replace('/[()\s\.\-]/', '', $request->phone);

            $normalized = preg_replace('/^(\+62|62|628)/', '08', $raw);
            $normalized = preg_replace('/^(\+62|62)8/', '08', $normalized);
            $normalized = preg_replace('/^0+8/', '08', $normalized);

            $request->merge(['phone' => $normalized]);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'npwp' => ['required', 'string', 'max:16'],
            'phone' => ['required', 'regex:/^08[0-9]{8,12}$/'],
            'gender' => ['required', new Enum(Gender::class)]
        ]);

        $gender = Gender::from($request['gender']);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'npwp' => $validated['npwp'],
            'phone' => $validated['phone'],
            'gender' => $gender->value
        ]);

        $user->assignRole('guru');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('admin.dashboard', absolute: false));
    }
}