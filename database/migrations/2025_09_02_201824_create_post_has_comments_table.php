<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_has_comments', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('comment', 255);
            $table->foreignId('parent_id')->unsigned()->nullable()->constrained('post_has_comments')->onDelete('cascade');
            $table->foreignId('user_id')->unsigned()->constrained('users')->onDelete('cascade');
            $table->foreignId('post_id')->unsigned()->constrained('ngo_has_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_has_comments');
    }
};
