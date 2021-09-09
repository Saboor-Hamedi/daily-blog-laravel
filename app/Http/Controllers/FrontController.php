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
    // this is on the index.blade.php
    public function index(){
    $posts = Post::latest()->with(['tags' ,'categories', 'user'])
    ->where('is_published', 1)->paginate(4);
    return view('index', compact('posts'));
    }
    // show the single post
   public function show($post){
    $posts = Post::with('tags', 'categories', 'user')->where('slug', $post)->first();
    return view('front.show', compact('posts'));
    }
    
    
}
