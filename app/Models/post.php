<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Post extends Model
{
    use HasFactory;
     protected $table = 'posts';

     protected $fillable  = [
        'title', 'slug', 'body_post', 'user_id', 'image'
    ];

    public function user()
    {
         return $this->belongsTo(User::class);
    }

    public function tags()
    {   
         return $this->belongsToMany(Tag::class,'post_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_posts')->withTimestamps();
    }
    public function if_User(){
       return  $this->user->id == Auth::user()->id;
    }
}
