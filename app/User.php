<?php

namespace App;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
