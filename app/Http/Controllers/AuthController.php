<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function index()
    {
        return view("auth/login");
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated(), $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended($request->user()->role->name . ".dashboard");
        }
        return back()->withInput($request->input())->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    
}
