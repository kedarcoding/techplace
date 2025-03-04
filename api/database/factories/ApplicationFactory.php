<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\RequirementJob;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'candidate_id' => Candidate::factory(),
            'job_id' => RequirementJob::factory(), // Assuming you have a Job factory as well
            'applied_at' => now(),
            'status' => $this->faker->randomElement(['pending', 'interview', 'rejected', 'hired']),
        ];
    }
}
