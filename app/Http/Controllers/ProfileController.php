<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\user;
use Auth;
class ProfileController extends Controller
{

    //pull profiles form
    public function addpictureurl()
    {

        return view('profiles.addpicture');

    }

    public function savepictureurl(Request $request)
    {
        if($request->hasFile('avatar'))
        {

            Auth::user()->update(['image'=>$request->avatar->store('public/avatars')]);
            return redirect(route('posts.index'));
        }

    }
    
}
