<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluate_company', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
                $table->integer('training_palce_evaluation')->nullable(false);
                $table->text('pros')->nullable(false);
                $table->text('cons')->nullable(false);
                $table->text('new_skills_gained')->nullable(false);
                $table->text('skills_wish_they_included')->nullable(false);
                $table->text('skills_wish_were_given_better')->nullable(false);
                $table->boolean('recommend_sending_students')->nullable(false);
                $table->string('recommended_evaluate_sys', 45)->nullable(false);
                $table->string('evaluate_companycol', 45)->nullable(false);
                $table->text('recommended_evaluate_sys_explanation')->nullable(false);
                $table->boolean('internship_time_before_senior_year')->nullable(false);
                $table->boolean('more_than_one_internship')->nullable(false);
                $table->text('finding_training_difficulties')->nullable(false);
                $table->text('recommendations')->nullable(false);
                $table->text('notes_about_website')->nullable();
    
                $table->unsignedBigInteger('student_id');
                $table->foreign('student_id')->references('id')->on('student')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluate_company');
    }
};
