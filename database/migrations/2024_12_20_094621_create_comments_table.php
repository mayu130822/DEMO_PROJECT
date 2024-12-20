<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade'); // Foreign key to posts table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->text('content'); // Comment content
            $table->timestamps(); // Created at and updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
