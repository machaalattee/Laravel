<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('pages.auth.login');
    }

    function login(Request $request)
    {
        // validasi inputan yang masuk, harus sesuai pokoknya
        $validatedUser = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // cek login, jika berhasil maka login
        if(Auth::attempt($validatedUser)){
            return redirect()->to('/tipemobil');
        } else {
            return redirect()->to('/login');
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/login');
    }
}
