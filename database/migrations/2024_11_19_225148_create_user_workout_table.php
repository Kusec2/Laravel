<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_workout', function (Blueprint $table) {
            $table->foreignID('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignID('workout_id')->constrained('workouts')->onDelete('cascade');
            $table->primary(['user_id','workout_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_workout');
    }
};
