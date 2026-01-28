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
                'login_number' => '9876543210',
                'personal_email' => 'rajesh.personal@gmail.com',
                'personal_number' => '9123456789',
                'address' => '123, MG Road, New Delhi - 110001',
                'password' => '9876543210', // Auto-generated from login_number (will be hashed)
                'is_active' => true,
                'permissions' => [
                    'blogs' => true,
                    'gallery' => true,
                    'rooms' => true,
                    'hero_section' => true,
                    'user_forms' => true,
                    'subscriptions' => true,
                ],
            ]
        );

        // Staff 2: Regular Staff
        StaffUser::firstOrCreate(
            ['login_email' => 'staff@hotelkiran.com'],
            [
                'name' => 'Priya Sharma',
                'role' => 'receptionist',
                'login_email' => 'staff@hotelkiran.com',
                'login_number' => '9876543211',
                'personal_email' => 'priya.personal@gmail.com',
                'personal_number' => '9123456790',
                'address' => '456, Connaught Place, New Delhi - 110002',
                'password' => '9876543211', // Auto-generated from login_number (will be hashed)
                'is_active' => true,
                'permissions' => [
                    'blogs' => true,
                    'gallery' => true,
                    'rooms' => true,
                    'hero_section' => false,
                    'user_forms' => true,
                    'subscriptions' => true,
                ],
            ]
        );
    }
}
