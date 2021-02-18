<?php

namespace App\Http\Controllers;

use App\Models\Cashout;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login()
    {
        $this->validate(request(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt([
            'username' => request('username'),
            'password' => request('password')
        ])){

            return redirect('/admin/dashboard');

        }else{
            return redirect('/admin/login')->with('loginError','Credentials Does not Match!!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function dashboard()
    {
        $pendingPhotos = Photo::query()->with('user')->where('status','pending')->get();

        return view('admin.dashboard', compact('pendingPhotos'));
    }

    public function showCashouts()
    {
        $cashouts = Cashout::query()->with('user')->latest()->get();
        return view('admin.cashout',compact('cashouts'));
    }

    public function updateCashouts($id,$status)
    {
        Cashout::find($id)->update([
            'status' => $status
        ]);

        return redirect()->back();
    }


}



