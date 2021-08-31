<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;


// use Illuminate\Pagination\LengthAwarePaginator;
class PostController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
       return view('dashboard.posts.index', compact('tags', 'categories'));
    }

   public function store(Request $request)
   {
    $post = new Post();
        $validated = $request->validate([ // validation
            'title' => 'required|string|unique:posts|min:5|max:240',
            'body_post' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);//end
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'), '-');
        $post->body_post = $request->input('body_post');
        $post->user_id = Auth::user()->id;
        // upload image
        if ($request->hasFile('image')) {
            $image          = $request->file('image');
            $fileExtention  = time() . '.' . $image->getClientOriginalExtension();
            $location       = storage_path('app/public/postImages/' . $fileExtention);
            Image::make($image)->resize(400, 300)->save($location);
            $post->image = $fileExtention;
        }
        $post->save();  // save data
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect()->route('dashboard.admin')->with('success', 'Post created'); // redirect back with success message
    }
    
    public function show(Post $post){
     return view('dashboard.posts.show', compact('post'));
    }

 public function edit(Post $post)
 {
        $posts = Post::with('tags', 'categories')->where('slug', $post->slug)->first();
        $tags = Tag::all();
        $categories = Category::all();
        return view('dashboard.posts.update', compact(['post','posts','tags','categories']));
}

public function update(Request $request, Post $post)
{
        // $post->tags()->sync($request->tags);
        $validated = $request->validate([ 
            'title' => [
             'required',
             Rule::unique('posts')->ignore($post),
            ],
            'body_post' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);//end

        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'), '-');
        $post->body_post = $request->input('body_post');
        $post->user_id = Auth::user()->id;
        if($request->tags != null){
          $post->tags()->sync($request->tags);
        }
        if($request->categories !=null){
          $post->categories()->sync($request->categories);
        }
        
        // upload image
        if ($request->hasFile('image')) {
            $oldFileName    = $post->image;
            $image          = $request->file('image');
            $fileExtention  = time() . '.'  . $image->getClientOriginalExtension();
            $location       = storage_path('app/public/postImages/' . $fileExtention);
            Image::make($image)->resize(1200, 630)->save($location);
            $post->image = $fileExtention;
            File::delete(storage_path('app/public/postImages/' . $oldFileName));
        }
        $post->save();  
        return redirect()->route('dashboard.admin')->with('success', 'Post Updated'); // redirect back with 
    }
    
    public function destroy(Post $post)
    {
     $deleteImage = storage_path('app/public/postImages/'. $post->image);
     if($post->delete()){
        if(file_exists($deleteImage)){
            @unlink($deleteImage);
        }
    }
    return redirect()->route('dashboard.admin')->with('success', 'Post deleted');
}
}
