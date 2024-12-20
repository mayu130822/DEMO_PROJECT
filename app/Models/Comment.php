<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Comment extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'user_id',
        'content',
    ];

    // Define relationships
    public function post()
    {
        return $this->belongsTo(Post::class); // A comment belongs to a post
    }

    public function user()
    {
        return $this->belongsTo(User::class); // A comment belongs to a user
    }
}
