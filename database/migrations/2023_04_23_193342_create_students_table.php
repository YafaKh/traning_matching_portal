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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); 
            $table->string('student_num', 12)->unique();
            $table->string('first_arabic_name', 45) ;
            $table->string('first_english_name', 45) ;
            $table->string('second_arabic_name', 45) ;
            $table->string('second_english_name', 45) ;
            $table->string('third_arabic_name', 45) ;
            $table->string('third_english_name', 45) ;
            $table->string('last_arabic_name', 45) ;
            $table->string('last_english_name', 45) ;
            $table->boolean('gender')->nullable();
            $table->integer('passed_hours') ;
            $table->float('gpa') ;
            $table->string('address', 45)->nullable();
            $table->string('email')->unique() ;
            $table->string('password', 45) ;
            $table->date('availability_date') ;
            $table->boolean('connected_with_a_company')->default(0);
            $table->string('connected_company_info', 100)->nullable();
            $table->string('phone', 15) ;
            $table->boolean('registered')->nullable(false)->default(0);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('specialization_id');
            $table->unsignedBigInteger('training_id');
            $table->foreign('university_id')
            ->references('id')->on('universities');
            $table->foreign('specialization_id')
            ->references('id')->on('specializations');
            $table->foreign('training_id')
            ->references('id')->on('trainings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
