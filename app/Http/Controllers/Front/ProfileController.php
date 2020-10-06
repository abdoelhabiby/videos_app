<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Front\ProfileRequest;
use App\Http\Requests\Front\ChangePasswordRequest;

class ProfileController extends Controller
{
    //-------------------------------------------

    public function index(User $user)
    {
        $title = 'profile | ' .  $user->name;
        $profile = $user;
        return view('front.user.profile', compact(['profile', 'title']));
    }
    //-------------------------------------------


    public function update(ProfileRequest $request)
    {
        try {

            $validated = $request->validated();

            if ($request->has('image') && $request->image != null) {

                $path = imageUpload($request->image, 'users');

                $validated['image'] = $path;

                if(user()->image !== 'images/user_default.png'){
                    deleteFile(user()->image);
                }
            }

            User::where('id', user()->id)->update($validated);

            return redirect()->back()->with(['success' => "success update"]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);
        }
    }



    //----------------------------------------------------------

    public function cahengePassword(ChangePasswordRequest $request)
    {
        try{
            if(Hash::check($request->old_password, user()->password)){

                $new_password = Hash::make($request->password);

                User::where('id', user()->id)->update(['password' => $new_password]);
                return redirect()->back()->with(['success' => "success cahnege password"]);

            }

            return redirect()->back()->with(['old_password' => "old password not correct"]);

         } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => "somw errors happend pleas try again later"]);
        }
    }

    //----------------------------------------------------------
    //----------------------------------------------------------


}
