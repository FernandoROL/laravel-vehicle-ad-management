<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("vehicles", function (Blueprint $table) {
            $table->id();
            $table->string("uniqueCode")->unique();
            $table->foreignId("brandID")->constrained("brands");
            $table->foreignId("modelID")->constrained("vehicle_models");
            $table->foreignId("versionID")->constrained("versions");
            $table->foreignId("typeID")->constrained("vehicle_types");
            $table->string("fipeCode")->nullable();
            $table->string("color");
            $table->string("engine");
            $table->string("trunkSize");
            $table->foreignId("userID")->constrained("users");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("vehicles");
    }
};
