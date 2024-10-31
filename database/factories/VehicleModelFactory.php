<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class VehicleModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uniqueCode' => $this->faker->unique()->uuid,
            'brandID' => Brand::inRandomOrder()->first()->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'userID' => User::inRandomOrder()->first()->id
        ];
    }
}
