<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class ProfileController extends Controller
{
    
    public function index(){
        $user_id  =  Auth::user()->id;
        $user    =  User::with(['profile'])->find($user_id);
        $posts = Post::where("user_id", "=", $user_id)->paginate(2);
        return view('dashboard.profiles.index', compact(['user', 'posts']));
    }

    public function update(Request $request){
        $user_id = Auth::user()->id;
        $profile = new Profile();
        if(is_null(Auth::user()->profile)){
            $profile->lastname = $request->lastname;
            $profile->bio = $request->bio;
            $profile->facebook = $request->facebook;
            $profile->instagram = $request->instagram;
            $profile->twitter = $request->twitter;
            $profile->github = $request->github;
            $profile->user_id = $request->user_id;
               // upload image
            if ($request->hasFile('image')) {
                $image          = $request->file('image');
                $fileExtention  = time() . '.' . $image->getClientOriginalExtension();
                $location       = storage_path('app/public/profileImages/' . $fileExtention);
                Image::make($image)->resize(400, 300)->save($location);
                $profile->image = $fileExtention;
            }
            $profile->save();
        }else{  
            Profile::where('user_id', $user_id)
            ->update([
                'lastname'  => $request->lastname, 
                'bio'       => $request->bio, 
                'facebook'  => $request->facebook, 
                'instagram' => $request->instagram, 
                'twitter'   => $request->lastname, 
                'github'    => $request->github, 
            ]);
            if ($request->hasFile('image')) {
                $oldFileName    = $profile->image;
                $image          = $request->file('image');
                $fileExtention  = time() . '.'  . $image->getClientOriginalExtension();
                $location       = storage_path('app/public/profileImages/' . $fileExtention);
                Image::make($image)->resize(1200, 630)->save($location);
                $profile->image = $fileExtention;
                File::delete(storage_path('app/public/profileImages/' . $oldFileName));
            }

        }
        return redirect(route('profiles.index', Auth::user()->id));
    }

    public function imageNull(){
        return $this?->profile?->image;
    }
      
}
