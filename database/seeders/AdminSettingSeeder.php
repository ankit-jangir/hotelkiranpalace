<?php

namespace Database\Seeders;

use App\Models\AdminSetting;
use Illuminate\Database\Seeder;

class AdminSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if settings already exist
        if (AdminSetting::count() > 0) {
            return;
        }

        AdminSetting::create([
            // Staff Information
            'staff_email_1' => 'frontdesk1@hotelkiranplace.com',
            'staff_email_2' => 'frontdesk2@hotelkiranplace.com',
            'staff_email_3' => 'frontdesk3@hotelkiranplace.com',
            'staff_number_1' => '+91 98765 43210',
            'staff_number_2' => '+91 98765 43211',
            'staff_number_3' => '+91 98765 43212',
            
            // Admin Information
            'admin_email_1' => 'admin@hotelkiranplace.com',
            'admin_email_2' => 'info@hotelkiranplace.com',
            'admin_number_1' => '+91 22 6137 1720',
            'admin_number_2' => '+91 22 6639 5515',
            
            // Address
            'address' => 'Royal Palace Road, Heritage District, New Delhi, India 110001',
            
            // Admin Profile (password will be hashed automatically by model)
            'admin_name' => 'Ankit',
            'admin_email' => 'ankit@mail.com',
            'admin_password' => 'Ankit@19', // Will be automatically hashed by AdminSetting model
        ]);
    }
}
