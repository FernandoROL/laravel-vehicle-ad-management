<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uniqueCode' => $this->faker->unique()->uuid,
            'name' => $this->faker->company,
            'description' => $this->faker->sentence,
            'userID' => User::inRandomOrder()->first()->id
        ];
    }
}
