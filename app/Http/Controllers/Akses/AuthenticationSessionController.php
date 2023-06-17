<?php

namespace App\Http\Controllers\Akses;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;

class AuthenticationSessionController extends Controller
{
    public function create()
    {
        if (auth()->guard('web')->check()) {
            $user = User::find(auth()->user()->id);
            if ($user->hasRole('admin')) {
                return to_route('admin.dashboard');
            }
            if ($user->hasRole('koordinator')) {
                return to_route('koordinator.dashboard');
            }
            if ($user->hasRole('verifikator')) {
                return to_route('verifikator.dashboard');
            }
        }
        return view('akses.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('peserta')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
