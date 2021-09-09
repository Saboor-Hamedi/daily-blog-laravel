<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
      public function index(){
        $posts = Post::with('categories')
        ->where('user_id', '=' , Auth::user()->id)
        ->paginate(3);
        return view('dashboard.user.index', compact('posts'));
      }

     
      public function profile(){
        return view('dashboard.profile.show');
      }
}
