<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CatValidate;
use Illuminate\Support\Str;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        // $cats = Category::with('posts')->get();
        $cats = Category::all();
        return view('dashboard.categories.index', compact('cats')); 
    }
    public function create(){
        return view('dashboard.categories.create');
    }
   public function store(CatValidate $request){
        $cat = new Category;
        $cat->name = $request->input('category');
        $cat->slug = Str::slug($request->input('category'),'-');
        $cat->save();
         return redirect()->route('dashboard.admin')->with('success', 'Category Created');
    }
}

