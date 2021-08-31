<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class DashboardController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   public function index(){
      $posts = Post::with('categories')
                     ->paginate(3);
      // $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
    return view('dashboard.admin.index', compact('posts'));
   }
}
