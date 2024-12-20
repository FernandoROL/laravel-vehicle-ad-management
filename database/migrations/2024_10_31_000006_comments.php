<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("comments", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("body");
            $table->foreignId("vehicleID")->constrained("vehicles");
            $table->foreignId("userID")->constrained("users");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("comments");
    }
};
