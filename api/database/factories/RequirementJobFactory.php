<?php

namespace Database\Factories;

use App\Models\Recruiter;
use App\Models\RequirementJob;
use Illuminate\Database\Eloquent\Factories\Factory;
use PHPUnit\Metadata\Version\Requirement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequirementJob>
 */
class RequirementJobFactory extends Factory
{
    protected $model = RequirementJob::class;

    public function definition()
    {
        return [
            'recruiter_id' => Recruiter::factory(), // Link job to a recruiter
            'job_title' => $this->faker->jobTitle,
            'job_description' => $this->faker->text(300),
            'job_location' => $this->faker->city,
            'job_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'internship']),
            'salary_range' => $this->faker->randomElement(['$40,000 - $60,000', '$60,000 - $80,000', '$80,000 - $100,000']),
        ];
    }

}
