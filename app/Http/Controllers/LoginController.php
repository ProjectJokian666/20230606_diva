<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $remember = $request->remember != null ? true : false;
        if(Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 1
        ], $remember) || Auth::attempt([
            'username'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 1
        ], $remember)){
            Session::put('sweetalert', 'warning');
            return redirect()->route('dashboard')->with('alert', 'Selamat Datang!');
        }elseif(Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 2
        ], $remember) || Auth::attempt([
            'username'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 2
        ], $remember)){
            Session::put('sweetalert', 'warning');
            return redirect()->route('dashboard')->with('alert', 'Selamat Datang!');
        }elseif(Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 3
        ], $remember) || Auth::attempt([
            'username'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 3
        ], $remember)){
            Session::put('sweetalert', 'warning');
            return redirect()->route('dashboard')->with('alert', 'Selamat Datang!');
        }elseif(Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 4
        ], $remember) || Auth::attempt([
            'username'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 4
        ], $remember)){
            Session::put('sweetalert', 'warning');
            return redirect()->route('dashboard')->with('alert', 'Selamat Datang!');
        }elseif(Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 5
        ], $remember) || Auth::attempt([
            'username'     => $request->email,
            'password'  => $request->password,
            'role_id'      => 5
        ], $remember)){
            Session::put('sweetalert', 'warning');
            return redirect()->route('dashboard')->with('alert', 'Selamat Datang!');
        }
        
        Session::put('sweetalert', 'error');
        return redirect('login')->with('alert','Email atau Password anda salah!');
    }

    public function logout(){
        Auth::logout();
        Session::put('sweetalert', 'success');
        return redirect()->route('homepage')->with('alert', 'Sign Out Berhasil!');
    }
}
