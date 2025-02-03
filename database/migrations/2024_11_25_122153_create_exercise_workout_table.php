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
        Schema::create('exercise_workout', function (Blueprint $table) {
            $table->foreignID('exercise_id')->constrained('exercises')->onDelete('cascade');
            $table->foreignID('workout_id')->constrained('workouts')->onDelete('cascade');
            $table->primary(['exercise_id','workout_id']);
            $table->integer('order_num');
            $table->integer('sets');
            $table->integer('repetitions')->nullable();
            $table->integer('duration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_workout');
    }
};
