<?php

namespace Database\Seeders;

use App\Models\StaffUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaffUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing staff users (optional - comment out if you want to keep existing)
        // StaffUser::truncate();

        // Staff 1: Manager
        StaffUser::firstOrCreate(
            ['login_email' => 'manager@hotelkiran.com'],
            [
                'name' => 'Rajesh Kumar',
                'role' => 'manager',
                'login_email' => 'manager@hotelkiran.com',
                'login_number' => '+919876543210',
                'personal_email' => 'rajesh.personal@gmail.com',
                'personal_number' => '+919123456789',
                'address' => '123, MG Road, New Delhi - 110001',
                'password' => 'Manager@123', // Will be auto-hashed by model
                'is_active' => true,
                'permissions' => [
                    'blogs' => true,
                    'gallery' => true,
                    'rooms' => true,
                    'hero_section' => true,
                    'user_forms' => true,
                    'user_subscribe' => true,
                ],
            ]
        );

        // Staff 2: Regular Staff
        StaffUser::firstOrCreate(
            ['login_email' => 'staff@hotelkiran.com'],
            [
                'name' => 'Priya Sharma',
                'role' => 'staff',
                'login_email' => 'staff@hotelkiran.com',
                'login_number' => '+919876543211',
                'personal_email' => 'priya.personal@gmail.com',
                'personal_number' => '+919123456790',
                'address' => '456, Connaught Place, New Delhi - 110002',
                'password' => 'Staff@123', // Will be auto-hashed by model
                'is_active' => true,
                'permissions' => [
                    'blogs' => true,
                    'gallery' => true,
                    'rooms' => true,
                    'hero_section' => false,
                    'user_forms' => true,
                    'user_subscribe' => true,
                ],
            ]
        );
    }
}
