<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatorController extends Controller
{
    public function index()
    {
        return view('authenticator.login');
    }

    public function authenticate(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors(['Email or password is incorrect']);
        }

        return to_route('stores.index');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('login');
    }
}
