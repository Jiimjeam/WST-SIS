<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in as an admin
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                return redirect()->route('Admin Dashboard');
            }

            return redirect()->route('dashboard');
        }

        // Attempt to log in as a student
        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        // If both fail, return an error
        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        } elseif (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Handle redirection after authentication.
     */
    public function authenticated(Request $request, $user)
    {
        if (Auth::guard('web')->check() && $user->isAdmin()) {
            return redirect()->route('Admin Dashboard');
        }

        if (Auth::guard('student')->check()) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('dashboard');
    }
}
