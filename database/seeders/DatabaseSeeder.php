<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create test user only if it doesn't exist
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Seed dummy blog, gallery, subscriptions, contacts, hero sections, rooms, admin settings and staff users
        $this->call([
            BlogSeeder::class,
            GallerySeeder::class,
            SubscriptionSeeder::class,
            ContactSeeder::class,
            HeroSectionSeeder::class,
            RoomSeeder::class,
            AdminSettingSeeder::class,
            StaffUserSeeder::class,
        ]);
    }
}
