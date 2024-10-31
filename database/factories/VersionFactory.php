<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Brand;
use App\Models\VehicleModel;

class VersionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uniqueCode' => $this->faker->unique()->uuid,
            'brandID' => Brand::inRandomOrder()->first()->id,
            'modelID' => VehicleModel::inRandomOrder()->first()->id,
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'userID' => User::inRandomOrder()->first()->id
        ];
    }
}
