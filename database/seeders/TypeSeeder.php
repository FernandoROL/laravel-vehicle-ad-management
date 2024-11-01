<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleType;


class TypeSeeder extends Seeder
{
    public function run()
    {
        VehicleType::create([
            "name"=> "Car",
        ]);
    }
}
