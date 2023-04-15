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
        Schema::create('student_skill', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('level', 45)->nullable();
           
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('student_id')
            ->references('id')->on('student');
            $table->foreign('skill_id')
            ->references('id')->on('skill');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_skill');
    }
};
