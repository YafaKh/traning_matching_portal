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
        Schema::create('students_spoken_languages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('speaking_level', 45)->nullable(false);
            $table->string('writing_level', 45)->nullable(false);
            $table->string('listening_level', 45)->nullable(false);
            
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('spoken_language_id');
            $table->foreign('student_id')
            ->references('id')->on('students');
            $table->foreign('spoken_language_id')
            ->references('id')->on('spoken_languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_spoken_languages');
    }
};
