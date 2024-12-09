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
            'username.required' => 'Email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect('/sesi/home')->with('success', 'Berhasil login');
        }else{
            return redirect('/sesi/login')->with('gagal', 'Gagal login');
        }
    }
}
