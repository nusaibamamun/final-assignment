<?php

namespace App\Http\Controllers;

use App\Models\Cashout;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function upload()
    {
        $this->validate(request(),[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png|min:10'
        ]);

        $imageName = uniqid().'.jpg';
        request('image')->move('photos',$imageName);


        Photo::create([
            'title' => request('title'),
            'user_id' => Auth::id(),
            'description' => request('description'),
            'image' => $imageName
        ]);

        return redirect()->back()->with('uploadSuccess','Upload Success!!');
    }

    public function gallery()
    {
        $photos = User::find(Auth::id())->photos()->latest()->paginate(5);

        return view('user.gallery',compact('photos'));
    }

    public function updatePhotoStatus($id,$status)
    {
        Photo::find($id)->update([
            'status' => $status
        ]);

        return redirect()->back();
    }

    public function cashOut()
    {
        $user = User::find(Auth::id());
        $balance = $user->balance;
        $earning = Cashout::where('status','approved')
            ->where('user_id',Auth::id())
            ->sum('amount');
        $cashouts = $user->cashout()->latest()->get();
        return view('user.cashout',compact(['balance','cashouts','earning']));
    }

    public function processCashOut()
    {
        $userBalance = Auth::user()->balance;
        if($userBalance >= 10){
            $user = User::find(Auth::id());
            $user->cashout()->create([
                'amount' => $userBalance
            ]);

            $user->update([
                'balance' => 0
            ]);

            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
