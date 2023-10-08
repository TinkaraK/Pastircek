<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
            'remember_me' => 'nullable|boolean',
        ]);

        $credentials = $request->only('email', 'password');
        if (!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(['password' => "Prijava ni uspela"]);
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember_me'));

        return redirect()->route('home');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
