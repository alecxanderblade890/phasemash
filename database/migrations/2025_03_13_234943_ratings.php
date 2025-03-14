<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Person's name
            $table->string('image_url'); // Profile picture URL
            $table->integer('rating')->default(1400); // Elo initial rating
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_ratings');
    }
};
