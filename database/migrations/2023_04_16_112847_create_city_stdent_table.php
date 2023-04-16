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
        Schema::create('city_stdent', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('preferred_city_id');
            $table->unsignedBigInteger('student_id');

            $table->foreign('preferred_city_id')
                ->references('id')
                ->on('preferred_city')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
            $table->foreign('student_id')
                ->references('id')
                ->on('student');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_stdent');
    }
};
