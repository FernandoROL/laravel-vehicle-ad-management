<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Brand;
use App\Models\VehicleModel;
use App\Models\Version;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory()->count(3)->create();

        $brands = Brand::factory(3)->create();

        $brands->each(function ($brand) use ($users) {
            $models = VehicleModel::factory(5)->create();

            $models->each(function ($model) use ($users) {
                Version::factory(2)->create();
            });
        });
    }
}
