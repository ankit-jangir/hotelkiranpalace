<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\AdminSetting;
use Illuminate\Support\Facades\Hash;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

/*
 * Create New Admin User Command
 * 
 * Usage: php artisan admin:create
 * 
 * This command will prompt you to enter:
 * - Admin Name
 * - Admin Email
 * - Admin Password
 * 
 * The password will be automatically hashed by AdminSetting model's setAdminPasswordAttribute mutator.
 * 
 * Example:
 * php artisan admin:create
 * 
 * Uncomment the code below to use this command:
 */
/*
Artisan::command('admin:create', function () {
    $name = $this->ask('Enter admin name');
    $email = $this->ask('Enter admin email');
    $password = $this->secret('Enter admin password');
    
    if (!$name || !$email || !$password) {
        $this->error('All fields are required!');
        return;
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->error('Invalid email address!');
        return;
    }
    
    // Validate password length
    if (strlen($password) < 6) {
        $this->error('Password must be at least 6 characters long!');
        return;
    }
    
    // Get or create admin settings
    $adminSettings = AdminSetting::first();
    if (!$adminSettings) {
        $adminSettings = AdminSetting::create([]);
    }
    
    // Update admin profile (password will be auto-hashed by model)
    $adminSettings->admin_name = $name;
    $adminSettings->admin_email = $email;
    $adminSettings->admin_password = $password; // Model will automatically hash this
    $adminSettings->save();
    
    $this->info('Admin created successfully!');
    $this->info('Name: ' . $name);
    $this->info('Email: ' . $email);
    $this->warn('Please remember your password. It has been securely hashed.');
})->purpose('Create a new admin user');
*/