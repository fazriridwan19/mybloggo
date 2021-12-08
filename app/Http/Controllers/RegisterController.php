<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register/index', [
            "judul"=>"Register"
        ]);
    }

    public function store(Request $request){
        /*=============Validasi data=============*/
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|min:5|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);    // Enkripsi password
        User::create($validatedData);                                           // Memanggil model User untuk input data ke database
        return redirect('/login')                                               // Setelah input data diarahkan ke menu login
                ->with('success', 'Registration successfull ! Please Login');   // Dengan memberi data untuk ditampilkan pada alert                    
    }
}
