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
        Schema::create('evaluate_students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('student_weaknesses') ;
            $table->boolean('willing_to_hire')->default(0);
            $table->text('willing_to_hire_reason') ;
            $table->string('comments', 200) ;
            $table->tinyInteger('fulfillin_ required_tasks') ;
            $table->tinyInteger('teamwork_ability') ;
            $table->tinyInteger('punctuality') ;
            $table->tinyInteger('quality_of_work') ;
            $table->tinyInteger('dependability') ;
            $table->tinyInteger('initiative') ;
            $table->tinyInteger('general_appearance') ;
            $table->tinyInteger('ability_to_judge') ;
            $table->tinyInteger('enthusiasm') ;
            $table->tinyInteger('communicational_skills') ;
            $table->tinyInteger('english_language_proficiency') ;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluate_students');
    }
};
