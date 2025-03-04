<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)
        ->has(Profile::factory()->state([
            'profileable_id' => 'id',
            'profileable_type' => 'App\Models\User',
        ]))
        ->create();
        
        $this->call([
            RecruiterSeeder::class,
            CandidateSeeder::class,
            ApplicationSeeder::class,
        ]);
    }
}
