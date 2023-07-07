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
        Schema::create('evaluate_companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('skills_you_trained');
            $table->integer('training_palce_evaluation') ;
            $table->text('pros') ;
            $table->text('cons') ;
            $table->text('new_skills_gained') ;
            $table->text('skills_wish_they_included') ;
            $table->text('skills_wish_were_given_better') ;
            $table->boolean('recommend_sending_students') ;
            $table->string('recommended_evaluate_sys') ;
            $table->string('evaluate_companycol')->nullable() ;//??
            $table->text('recommended_evaluate_sys_explanation')->nullable() ;
            $table->boolean('internship_time_before_senior_year') ;
            $table->boolean('more_than_one_internship') ;
            $table->text('finding_training_difficulties') ;
            $table->text('recommendations') ;
            $table->text('notes_about_website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluate_companies');
    }
};
