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
        Schema::create('evaluate_student', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('training_palce_evaluation')->nullable();
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->text('new_skills_gained')->nullable();
            $table->text('skills_wish_they_included')->nullable();
            $table->text('skills_wish_were_given_better')->nullable();
            $table->boolean('recommend_sending_students')->nullable();
            $table->string('recommended_evaluate_sys', 45)->nullable();
            $table->string('evaluate_companycol', 45)->nullable();
            $table->text('recommended_evaluate_sys_explanation')->nullable();
            $table->boolean('internship_time_before_senior_year')->nullable();
            $table->boolean('more_than_one_internship')->nullable();
            $table->text('finding_training_difficulties')->nullable();
            $table->text('recommendations')->nullable();
            $table->text('notes_about_website')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('student')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluate_student');
    }
};
