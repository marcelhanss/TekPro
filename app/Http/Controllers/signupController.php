<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class signupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sesi/signup');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'username' =>'required|string|unique:users,username',
            'password' =>'required|string',
            'password2' =>'required|same:password',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password2.required' => 'Password2 wajib diisi',
        ]);

        $data = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ];
        
        User::create($data);
        return redirect('/sesi/login')->with('success', 'Beerhasil Didaftarkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
