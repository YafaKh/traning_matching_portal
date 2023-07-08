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
        Schema::create('preferred_training_field_student', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('preferred_training_id');
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('no action')
                ->onUpdate('no action')->onDelete('cascade');
            $table->foreign('preferred_training_id')
                ->references('id')
                ->on('preferred_training_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferred_training_field_student');
    }
};
