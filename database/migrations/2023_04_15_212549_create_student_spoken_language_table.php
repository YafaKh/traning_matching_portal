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
        Schema::create('student_spoken_language', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('speaking_level', 45)->nullable();
            $table->string('writing_level', 45)->nullable();
            $table->string('listening_level', 45)->nullable();
            
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('spoken_language_id');
            $table->foreign('student_id')
            ->references('id')->on('student');
            $table->foreign('spoken_language_id')
            ->references('id')->on('spoken_language');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_spoken_language');
    }
};
