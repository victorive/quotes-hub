<?php

namespace App\Http\Controllers\V1\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLoginForm(): Application|Factory|View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return back()->with('error', 'Incorrect login details, please try again');
        }

        return redirect()->route('quotes');
    }
}
