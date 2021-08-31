<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class Cards extends Component
{
  
    public function __construct()
    {
        //
    }
    public function render()
    {
        // $posts  = DB::table('posts')->count(DB::raw('id'));
        $posts =      DB::table('posts')->count();
        $users =      DB::table('users')->count();
        $categories = DB::table('categories')->count();
        $tags = Tag::all();
        return view('components.cards', compact(['posts', 'users', 'categories', 'tags']));
    }
}
