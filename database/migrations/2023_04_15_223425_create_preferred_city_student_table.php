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
        Schema::create('preferred_city_student', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('preferred_training_field_id');
            $table->foreign('student_id', 'fk_preferred_training_field_student_student1')
                ->references('id')
                ->on('student')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('preferred_training_field_id', 'fk_preferred_training_field_student_preferred_training_field1')
                ->references('id')
                ->on('preferred_training_field');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferred_city_student');
    }
};
