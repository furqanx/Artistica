<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('auth.login');
    }  
    
    /**
     * Proses login menggunakan data yang dikirimkan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        
        if ($user && $user->password === $credentials['password']) {
            Auth::login($user);
            return redirect()->intended('home')->withSuccess('Signed in');
        }
        
        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Menampilkan halaman registrasi.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function register()
    {
        return view('auth.register');
    }
     
    /**
     * Proses registrasi menggunakan data yang dikirimkan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customRegister(Request $request)
    { 
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data); 
         
        return redirect("login")->withSuccess('Succesfully created account');
    }
    
    /**
     * Membuat user baru berdasarkan data yang diberikan.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

    /**
     * Keluar dari sesi dan mengarahkan pengguna ke halaman login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
