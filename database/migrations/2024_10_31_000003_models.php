<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("vehicle_models", function (Blueprint $table) {
            $table->id();
            $table->string("uniqueCode")->unique();
            $table->foreignId("brandID")->constrained("brands");
            $table->string("name");
            $table->text("description")->nullable();
            $table->foreignId("userID")->constrained("users");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("models");
    }
};
