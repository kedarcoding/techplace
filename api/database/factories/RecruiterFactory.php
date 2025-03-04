<?php

namespace Database\Factories;

use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecruiterFactory extends Factory
{
    protected $model = Recruiter::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // This will create a User and associate with the recruiter
            'company_name' => $this->faker->company,
            'company_description' => $this->faker->text(200),
            'contact_number' => $this->faker->phoneNumber,
            'location' => $this->faker->city,
            'industry' => $this->faker->word,
        ];
    }
}
