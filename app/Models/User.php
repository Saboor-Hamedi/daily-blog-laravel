<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function profile(){
        // , 'user_id', 'id'
        return $this->hasOne(Profile::class);
    }
    public function posts()
    {
     return $this->hasMany(Post::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_Admin(){
        return $this->status == 0;
    }
    public function is_User(){
        return $this->status == 1;
    }
    
}
