<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Post extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'status',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class); // A post belongs to a user
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); // A post has many comments
    }
}
