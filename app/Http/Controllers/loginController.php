<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view("sesi/login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        
        // Cek erro bila tidak sama
        if (Auth::attempt($data)) {

            return redirect('/sesi/home');

            $user = Auth::user();
            if ($user->isAdmin == 1) {
                return redirect('/sesi/home');
            } else {
                return redirect('/sesi/home');
            }

        } else {
            return back()->withErrors([
                'username' => 'Username atau password salah',
            ]);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}