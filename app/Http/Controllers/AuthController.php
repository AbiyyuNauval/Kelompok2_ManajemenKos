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

    public function showSignup(){
        return view('home.signup');
    }

    public function signup(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min: 8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'confirmed']
        ]);

        return view('home.login', [
            'success' => 'Pendaftaran berhasil! Silahkan login.'
        ]);
    }

    public function showLogin(){
        return view('home.login');
    }

    public function login(Request $request){
        $auth = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $admin = [
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'Admin1234'
        ];

        $pelanggan = [
            'username' => 'Pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => 'Pelanggan1234'
        ];

        $users = [
            [
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'Admin1234',
                'role' => 'Admin',
                'redirect_to' => '/admin/dashboard'
            ],
            [
                'username' => 'Pelanggan',
                'email' => 'pelanggan@gmail.com',
                'password' => 'Pelanggan1234',
                'role' => 'Pelanggan',
                'redirect_to' => '/home'
            ],
        ];

        foreach ($users as $user){
            if ($auth['email'] == $user['email'] && $auth['password'] == $user['password']){
                $request->session()->put('user', [
                    'email' => $user['email'],
                    'username' => $user['username']
                ]);

                session(['role' => $user['role']]);
                return Redirect::to($user['redirect_to']);
            }
        }

        if ($auth['email'] == $pelanggan['email'] && $auth['password'] == $pelanggan['password']){
            $request->session()->put('user', [
                'email' => $pelanggan['email'],
                'username' => $pelanggan['username']
            ]);

            session(['role' => 'Pelanggan']);
            return Redirect::to('/home');
        }

        return view('home.login', [
            'error' => 'Email atau password salah.'
        ]);
    }

    public function logout(Request $request){
        $request->session()->flush();

        return Redirect::to('/home/login');
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
