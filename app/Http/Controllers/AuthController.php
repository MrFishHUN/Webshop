<?php

namespace App\Http\Controllers;

use App\CartStatus;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Sikeres regisztráció! Most jelentkezz be.');
    }

    public function login(Request $request)
    {


        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user) {
                Cart::create([
                    'user_id' => $user->id,
                    'status' => CartStatus::EMPTY
                ]);

            }
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Hibás e-mail vagy jelszó.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
