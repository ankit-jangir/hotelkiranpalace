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
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->id();
            
            // Staff Information (3 emails + 3 numbers)
            $table->string('staff_email_1')->nullable();
            $table->string('staff_email_2')->nullable();
            $table->string('staff_email_3')->nullable();
            $table->string('staff_number_1')->nullable();
            $table->string('staff_number_2')->nullable();
            $table->string('staff_number_3')->nullable();
            
            // Admin Information (2 emails + 2 numbers)
            $table->string('admin_email_1')->nullable();
            $table->string('admin_email_2')->nullable();
            $table->string('admin_number_1')->nullable();
            $table->string('admin_number_2')->nullable();
            
            // Address
            $table->text('address')->nullable();
            
            // Admin Profile
            $table->string('admin_name')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('admin_password')->nullable();
            $table->string('otp')->nullable();
            $table->timestamp('otp_expires_at')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_settings');
    }
};
