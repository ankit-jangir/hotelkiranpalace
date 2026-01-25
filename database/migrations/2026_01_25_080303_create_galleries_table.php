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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->string('main_image')->nullable();
            $table->string('main_video')->nullable();
            $table->json('sub_images')->nullable(); // Array of sub images/videos
            $table->enum('type', ['image', 'video'])->default('image');
            $table->string('file_path')->nullable(); // Keep for backward compatibility
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
