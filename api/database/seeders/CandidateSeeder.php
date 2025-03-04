<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidate::factory(200)->has(Profile::factory()->state([
            'profileable_id' => 'id',
            'profileable_type' => 'App\Models\Candidate',
        ]))->create();
    }
}
