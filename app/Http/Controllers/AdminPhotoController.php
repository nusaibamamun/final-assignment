<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
    public function updatePendingImage($id,$status)
    {
        Photo::find($id)->update([
            'status' => $status
        ]);

        return redirect()->back();
    }

    public function sellingImage(){
        $photos = Photo::query()->with('user')
            ->where('status','selling')
            ->orWhere('status','buy-out')
            ->orWhere('status','rejected')
            ->latest()->paginate(5);
        return view('admin.selling',compact('photos'));
    }

    public function processPhoto()
    {
        $this->validate(request(),[
            'id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);

        if(request('status') == 'buy-out'){
            if(request('rate')!=null && request('rate')!=''){
                Photo::find(request('id'))->update([
                    'status' =>  'buy-out',
                    'rate' => request('rate')
                ]);

                $user = User::find(\request('user_id'));
                $prevBalance = $user->balance;
                $newBalance = $prevBalance + \request('rate');
                $user->update([
                    'balance' => $newBalance
                ]);

                return redirect()->back();
            }else{
                return redirect()->back();

            }
        }else{
            Photo::find(request('id'))->update([
                'status' =>  \request('status'),
            ]);

            return redirect()->back();
        }
    }
}
