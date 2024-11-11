<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Brand;
use App\Models\VehicleModel;
use App\Models\Version;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 3 users
        $users = [];
        for ($i = 1; $i <= 3; $i++) {
            $users[] = User::create([
                'name' => "User $i",
                'email' => "user{$i}@example.com",
                'password' => Hash::make('password'),
                'status' => true,
            ]);
        }

        // Create 3 brands, each with 5 models, and each model with 2 versions
        $brands = [];
        for ($i = 1; $i <= 3; $i++) {
            $brand = Brand::create([
                'uniqueCode' => Str::uuid(),
                'name' => "Brand $i",
                'description' => "Description for Brand $i",
                'userID' => $users[array_rand($users)]->id,
            ]);
            $brands[] = $brand;

            for ($j = 1; $j <= 5; $j++) {
                $model = VehicleModel::create([
                    'uniqueCode' => Str::uuid(),
                    'name' => "Model {$j} for Brand {$i}",
                    'description' => "Description for Model {$j} of Brand {$i}",
                    'brandID' => $brand->id,
                    'userID' => $users[array_rand($users)]->id,
                ]);

                for ($k = 1; $k <= 2; $k++) {
                    Version::create([
                        'uniqueCode' => Str::uuid(),
                        'name' => "Version {$k} of Model {$j} for Brand {$i}",
                        'description' => "Description for Version {$k} of Model {$j}",
                        'brandID' => $brand->id,
                        'modelID' => $model->id,
                        'userID' => $users[array_rand($users)]->id,
                    ]);
                }
            }
        }

        // Create 3 Vehicle Types
        $vehicleTypes = [
            VehicleType::create(['name' => 'Sedan']),
            VehicleType::create(['name' => 'SUV']),
            VehicleType::create(['name' => 'Truck']),
        ];

        // Create 5 unique Vehicles, each with a random type, brand, model, and version
        for ($i = 1; $i <= 5; $i++) {
            Vehicle::create([
                'uniqueCode' => Str::uuid(),
                'brandID' => $brands[array_rand($brands)]->id,
                'modelID' => $brands[array_rand($brands)]->models->random()->id,
                'versionID' => $brands[array_rand($brands)]->models->random()->versions->random()->id,
                'typeID' => $vehicleTypes[array_rand($vehicleTypes)]->id,
                'fipeCode' => Str::random(10),
                'color' => 'Color' . $i,
                'engine' => 'Engine' . $i,
                'trunkSize' => 'Trunk Size ' . $i . 'L',
                'userID' => $users[array_rand($users)]->id,
            ]);
        }

        // Create 4 Comments for random Vehicles by random Users
        $vehicles = Vehicle::all();
        for ($i = 1; $i <= 4; $i++) {
            Comment::create([
                'title' => "Comment Title $i",
                'body' => "This is the body of comment $i.",
                'vehicleID' => $vehicles->random()->id,
                'userID' => $users[array_rand($users)]->id,
            ]);
        }
    }
}
