<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            /** @var \App\Models\User $user */
            $user = $request->user();

            if ($user->hasRole('guru')) {
                return redirect()->intended(route('admin.dashboard', absolute: false) . '?verified=1');
            } elseif ($user->hasRole('siswa')) {
                return redirect()->intended(route('home', absolute: false) . '?verified=1');
            } else {
                return redirect()->intended(route('home', absolute: false) . '?verified=1');
            }
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}