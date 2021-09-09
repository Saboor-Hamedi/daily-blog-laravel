<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
  public function __construct()
   {
      $this->middleware('auth');
   }
   public function index(){
    $posts = Post::with('categories')
    ->paginate(3);
    return view('dashboard.admin.index', compact('posts'));
   }
}
