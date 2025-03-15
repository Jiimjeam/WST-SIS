<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
    
        $guard = session('auth_guard', 'web');
        Auth::shouldUse($guard); // Set the correct guard for the session
        $user = Auth::user();    // Retrieve the correct authenticated user

        if ($guard === 'web' && $user->role === 'admin') {
            return redirect()->route('Admin Dashboard');
        } elseif ($guard === 'student') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }
    
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('Admin Dashboard');
        } elseif ($user instanceof \App\Models\Student) {
            return redirect()->route('dashboard'); // New student route
        }
        return redirect()->route('dashboard');
    }   
}
