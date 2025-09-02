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
         Schema::create('ngo_has_posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('description')->nullable();
            $table->enum('type',['text','media'])->default('text');
            $table->unsignedInteger('impressions')->default(0);
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ngo_has_posts');
    }
};
