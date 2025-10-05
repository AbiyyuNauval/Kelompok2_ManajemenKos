<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        //
    }

    public function showLogin()
    {
        return view('home.login');
    }

    public function login(Request $request)
    {
        $auth = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $dataTest = [
            'email' => 'kelompok2@gmail.com',
            'password' => 'Kelompok2'
        ];

        if ($auth['email'] == $dataTest['email'] && $auth['password'] == $dataTest['password']){
            $request->session()->put('user', [
                'email' => $dataTest['email'],
                'username' => "Kelompok 2"
            ]);

            return Redirect::to('/');
        }

        return view('home.login', [
            'error' => 'Email atau password salah.'
        ]);
    }

    public function showSignup()
    {
        return view('home.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min: 8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'confirmed']
        ]);

        return view('home.login', [
            'success' => 'Pendaftaran berhasil! Silahkan login.'
        ]);
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
