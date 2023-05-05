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
            $table->text('student_weaknesses')->nullable(false);
            $table->boolean('willing_to_hire')->default(0);
            $table->text('willing_to_hire_reason')->nullable(false);
            $table->string('comments', 200)->nullable(false);
            $table->tinyInteger('fulfillin_ required_tasks')->nullable(false);
            $table->tinyInteger('teamwork_ability')->nullable(false);
            $table->tinyInteger('punctuality')->nullable(false);
            $table->tinyInteger('quality_of_work')->nullable(false);
            $table->tinyInteger('dependability')->nullable(false);
            $table->tinyInteger('initiative')->nullable(false);
            $table->tinyInteger('general_appearance')->nullable(false);
            $table->tinyInteger('ability_to_judge')->nullable(false);
            $table->tinyInteger('enthusiasm')->nullable(false);
            $table->tinyInteger('communicational_skills')->nullable(false);
            $table->tinyInteger('english_language_proficiency')->nullable(false);

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        
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
