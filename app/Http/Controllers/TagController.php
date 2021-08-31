<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagValidate;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagController extends Controller
{
    public function create(){
        return view('dashboard.tags.create');
    }

    public function index(){
         $tags = Tag::orderBy('created_at', 'desc')->paginate(20);
        
        return view('dashboard.tags.index', compact('tags'));
    }
    public function store(TagValidate $request){
        $tag = new Tag;
        $tag->name = $request->input('tag');
        $tag->slug = Str::slug($request->input('tag'),'-');
        $tag->save();
         return redirect()->route('tags.index')->with('success', 'tag has created!');
    }
}
