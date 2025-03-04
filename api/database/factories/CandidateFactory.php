<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'resume_url' => $this->faker->url,
            'contact_number' => $this->faker->phoneNumber,
            'location' => $this->faker->city,
            'experience_years' => $this->faker->numberBetween(1, 10),
            'education' => $this->faker->randomElement(['Bachelors', 'Masters', 'PhD']),
            'skills' => $this->faker->words(5, true),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
