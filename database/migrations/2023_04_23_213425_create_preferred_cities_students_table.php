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
        Schema::create('preferred_cities_students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('city_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferred_cities_students');
    }
};
