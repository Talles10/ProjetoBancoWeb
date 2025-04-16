<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowFormlogin(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended('/');
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')
    }
};*/