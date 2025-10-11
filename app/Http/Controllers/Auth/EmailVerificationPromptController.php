<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
            ? $this->redirectByRole($request->user())
            : view('auth.verify-email');
    }

    private function redirectByRole($user): RedirectResponse
    {
        /** @var \App\Models\User $user */
        if ($user->hasAnyRole(['superadmin', 'admin'])) {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        } elseif ($user->hasRole('customer')) {
            return redirect()->intended(route('user.dashboard', absolute: false));
        } else {
            return redirect()->intended(route('home', absolute: false));
        }
    }
}