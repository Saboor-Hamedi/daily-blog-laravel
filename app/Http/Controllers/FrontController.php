<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    public function index(){
    $posts = Post::latest()->with(['tags' ,'categories', 'user'])->paginate(4);
    return view('index', compact('posts'));
    }
   public function show($post){
    $posts = Post::with('tags', 'categories', 'user')->where('slug', $post)->first();
    return view('front.show', compact('posts'));
}
    
}
