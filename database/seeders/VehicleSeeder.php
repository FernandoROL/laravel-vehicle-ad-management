<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        Vehicle::create([
            'uniqueCode'=>'code123',
            'brandID'=>1,
            'modelID'=>1,
            'versionID'=>1,
            'typeID'=>1,
            'fipeCode'=>'123123',
            'color'=>'orange',
            'engine'=>'engine1',
            'trunkSize'=> 'L',
            'userID'=>2,
        ]);
    }
}
