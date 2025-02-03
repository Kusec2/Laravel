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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->date('measurement_date');
            $table->float('weight')->nullable();
            $table->float('chest')->nullable();
            $table->float('waist')->nullable();
            $table->float('hip')->nullable();
            $table->float('max_bench')->nullable();
            $table->float('max_deadlift')->nullable();
            $table->float('max_squat')->nullable();
            $table->foreignID('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
