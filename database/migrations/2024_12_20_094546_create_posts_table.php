<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('title'); // Post title
            $table->text('content'); // Post content
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft'); // Post status
            $table->timestamps(); // Created at and updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
