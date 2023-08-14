<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        if(session('login'))
        {
            return view('dashboard.index', ['title' => 'Dashboard']);
        }
      
        return view('authentication.index', ['title' => 'Login']);
    }

    public function login(Request $request)
    {
     
        
        $credentials = $request->validate([
            'id' => 'required',
            'password' =>'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // session(['login' => true]);
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout(Request $request): RedirectResponse
    {
        
        // Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->session()->flush();

        return redirect('/');
    }
}
