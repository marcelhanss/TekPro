<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view("sesi/login");
    }

        public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            // Mendapatkan user yang sudah login
            $user = Auth::user();

            // Cek apakah user adalah admin
            if ($user->isAdmin == 1) {
                // Jika isAdmin = 1, arahkan ke halaman admin
                return redirect('/admin/adminpage');
            } else {
                // Jika bukan admin, arahkan ke halaman home
                return redirect('/sesi/home');
            }
        } else {
            // Jika login gagal, kembali ke halaman login
            return redirect('/sesi/login');
        }

        
    }
}
