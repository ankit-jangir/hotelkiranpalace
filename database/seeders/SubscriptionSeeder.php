<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emails = [
            'john.doe@example.com',
            'jane.smith@example.com',
            'mike.johnson@example.com',
            'sarah.williams@example.com',
            'david.brown@example.com',
            'emily.davis@example.com',
            'robert.miller@example.com',
            'lisa.wilson@example.com',
            'james.moore@example.com',
            'mary.taylor@example.com',
            'william.anderson@example.com',
            'patricia.thomas@example.com',
            'richard.jackson@example.com',
            'jennifer.white@example.com',
            'joseph.harris@example.com',
            'linda.martin@example.com',
            'thomas.thompson@example.com',
            'barbara.garcia@example.com',
            'charles.martinez@example.com',
            'susan.robinson@example.com',
            'daniel.clark@example.com',
            'jessica.rodriguez@example.com',
            'matthew.lewis@example.com',
            'sarah.lee@example.com',
            'anthony.walker@example.com',
            'karen.hall@example.com',
            'mark.allen@example.com',
            'nancy.young@example.com',
            'donald.king@example.com',
            'betty.wright@example.com',
            'steven.lopez@example.com',
            'dorothy.hill@example.com',
            'paul.scott@example.com',
            'sandra.green@example.com',
            'andrew.adams@example.com',
            'ashley.baker@example.com',
            'joshua.gonzalez@example.com',
            'kimberly.nelson@example.com',
            'kevin.carter@example.com',
            'michelle.mitchell@example.com',
            'brian.perez@example.com',
            'amanda.roberts@example.com',
            'george.turner@example.com',
            'melissa.phillips@example.com',
            'edward.campbell@example.com',
            'deborah.parker@example.com',
            'ronald.evans@example.com',
            'stephanie.edwards@example.com',
            'kenneth.collins@example.com',
            'rebecca.stewart@example.com',
        ];

        $baseDate = Carbon::now()->subDays(60);
        
        foreach ($emails as $index => $email) {
            Subscription::firstOrCreate(
                ['email' => $email],
                [
                    'email' => $email,
                    'created_at' => $baseDate->copy()->addDays($index),
                    'updated_at' => $baseDate->copy()->addDays($index),
                ]
            );
        }
    }
}
