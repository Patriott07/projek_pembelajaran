<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthControlller extends Controller
{
    //

    public function login_view(){
        $data = "Pusat E-learning";
        // dd(Hash::make('123')); // untuk membuat password
        return view('login', ['data_web' => $data]); //menampilkan halaman
    }

    public function login(Request $request){ // form handle login
        // dd($request->all()); //ngecek isi data
        $user = User::where('email', $request->email)->first(); // ambil satu daata user yang cocok
        if(!$user) return redirect('/login')->with('err', 'Akun Email Anda Tidak Ditemukan!'); // fungsi untuk mengarahkan ke halaman tertentu 

        // kalo ada, cek password
        if(Hash::check($request->password, $user->password)){
            // bikin session
            Auth::login($user);

            if($user->role == "admin") return redirect('/user');
            if($user->role == "member") return redirect('/');
            if($user->role == "pengajar") return redirect('/profile');

            // arahin ke halaman 
        }

        return redirect('/login')->with('err', 'Password Anda Tidak Cocok, Coba Lagi!');
    }

    public function register_view(){
        return view('register'); 
    }

    public function register(Request $request){

        // dd($request->all()); // dd() buat cetak nilai 
        // request->all() ["name" => "indah", "password" => "123"]
        // Simpan user ke databases

        $request['role'] = "member"; // default role member
        // $request['role'] = "admin"; // default role member
        // $request['date'] = "20 januari";
        $request['password'] = Hash::make($request->password); // bisa menimpa value

         // request->all() ["name" => "indah", "password" => "Asuyausuasuaysyaegwfe6qwtque"]
        User::create($request->all());

        // Redirect atau tampilkan pesan sukses
        return redirect('/login')->with('ok', 'Registrasi berhasil, silakan login!');
    }

    public function logout(Request $request){
        // dd('ok');
        Auth::logout();
        return redirect('/login')->with('success', 'Thanks for coming.. see u soon');
    }
}
