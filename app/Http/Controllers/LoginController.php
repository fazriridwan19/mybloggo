<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login/index',[
            "judul"=>"Login"
        ]);
    }

    public function authenticate(Request $request){
        $credential = $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);

        /*Pengecekan user di database*/
        if(Auth::attempt($credential)){
            /*
            Method attempt() akan menerima array yang berisi key dan value secara berpasangan sebagai argumen pertama.
            Value dari array akan digunakan untuk menyocokkan data pada database.
            */
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();          // Melepaskan session user
        $request->session()->regenerateToken();     // Menghapus @csrf token
        return redirect('/posts');
    }
}
