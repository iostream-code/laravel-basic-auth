<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::chek()) {
            redirect('home');
        }

        return redirect('login');
    }

    public function auth(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email tidak sesuai',
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
