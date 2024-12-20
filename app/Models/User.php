<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define relationships
    public function posts()
    {
        return $this->hasMany(Post::class); // A user has many posts
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); // A user has many comments
    }
}
