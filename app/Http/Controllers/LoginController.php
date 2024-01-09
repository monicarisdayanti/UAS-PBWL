<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request) {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('/home')->with('loginSuccess', "<script>alert('Login berhasil')</script>");
        }

        return back()->with('pesan', "<script>alert('Username atau Password Salah')</script>");
    
    }

    public function store(Request $request) {

        $data = $request->validate([
            'email' => 'required|unique:users',
            'password' => '',
            'nama' => '',
            'alamat' => '',
            'hp' => '',
            'pos' => ''
        ]);
        
        User::create($data);
        
        return redirect('/login')->with('pesan', "<script>alert('Register berhasil, silahkan login sekarang!')</script>");
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
