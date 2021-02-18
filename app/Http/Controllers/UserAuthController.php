<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showRegistration()
    {
        return view('user.register');
    }

    public function register()
    {
        $this->validate(request(),[
            'username' => 'required|min:2|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        return redirect()->route('login.show')->with('registerOk','Registered Successfully!!');
    }

    public function showLogin()
    {
        return view('user.login');
    }

    public function login()
    {
        $this->validate(request(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'username' => request('username'),
            'password' => request('password')
        ])){

            return redirect()->route('user.dashboard');

        }else{
            return redirect()->route('login.show')->with('loginError','Credentials Does not Match!!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.show');
    }
}
