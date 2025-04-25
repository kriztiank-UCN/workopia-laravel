<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load job listings data
        $jobListings = include database_path('seeders/data/job_listings.php');

        // Get the ID of the user created by TestUserSeeder
        $testUserId = User::where('email', 'test@test.com')->value('id');

        // Get all other user IDs from user model, except the one created by TestUserSeeder
        $userIds = User::where('email', '!=', 'test@test.com')->pluck('id')->toArray();

        // ampersand (&) is used to pass by reference
        foreach ($jobListings as $index => &$listing) {
            if ($index < 2) {
                // Assign the first two job listings to the test user
                $listing['user_id'] = $testUserId;
            } else {
                // Assign the rest to random users
                $listing['user_id'] = $userIds[array_rand($userIds)];
            }
            // Add timestamps
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }

        // Insert job listings
        DB::table('job_listings')->insert($jobListings);

        echo "Jobs created successfully!";
    }
}
