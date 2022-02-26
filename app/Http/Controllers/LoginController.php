<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // LOGIN
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:5']
        ]);
        $remember = $request->filled('remember');

        // Validamos si el correo existe
        $user = User::where('email', $credentials['email'])->first();
        if ($user) {
            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

            throw ValidationException::withMessages([
                'password' => __('auth.password')
            ]);
        } else {
            throw ValidationException::withMessages([
                'email' => __('passwords.user')
            ]);
        }
    }
}
