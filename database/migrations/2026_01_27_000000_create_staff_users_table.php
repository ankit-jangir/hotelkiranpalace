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
        Schema::create('staff_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->default('staff'); // staff, manager, hr, etc.
            // Login identifiers (hotel-provided)
            $table->string('login_email')->nullable()->unique();
            $table->string('login_number')->nullable()->unique();
            // Personal contact
            $table->string('personal_email')->nullable();
            $table->string('personal_number')->nullable();
            $table->text('address')->nullable();
            // Auth
            $table->string('password'); // hashed
            $table->boolean('is_active')->default(true);
            $table->json('permissions')->nullable(); // per-module access control
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_users');
    }
};

