<?php

namespace App\Http\Controllers\Akses;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    function __invoke(Request $request): RedirectResponse | View
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended('/')
            : view('akses.verify-email');
    }
}
