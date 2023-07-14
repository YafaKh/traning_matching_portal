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
            $table->string('first_name_ar', 45) ;
            $table->string('first_name_en', 45) ;
            $table->string('second_name_ar', 45) ;
            $table->string('second_name_en', 45) ;
            $table->string('third_name_ar', 45) ;
            $table->string('third_name_en', 45) ;
            $table->string('last_name_ar', 45) ;
            $table->string('last_name_en', 45) ;
            $table->boolean('gender')->nullable();//male:0, female:1
            $table->integer('passed_hours') ;
            $table->integer('load') ;
            $table->float('gpa') ;
            $table->string('email')->unique();
            $table->string('linkedin')->nullable();
            $table->integer('english_level')->nullable();
            $table->string('password') ;
            $table->date('availability_date') ;
            $table->boolean('connected_with_a_company')->default(0);
            $table->string('connected_company_info', 100)->nullable();
            $table->string('phone', 20) ;
            $table->boolean('registered')->nullable(false)->default(0);
            $table->string('image')->nullable();
            $table->longText('work_experience')->nullable();
            $table->boolean('active')->default(1);

            $table->unsignedBigInteger('university_id')->defualt(1);
            $table->unsignedBigInteger('university_employee_id')->nullable();
            $table->unsignedBigInteger('specialization_id');
            $table->unsignedBigInteger('training_id')->nullable();
            $table->unsignedBigInteger('evaluate_student_id')->nullable();
            $table->unsignedBigInteger('evaluate_company_id')->nullable();
            $table->unsignedBigInteger('city_id');

            $table->foreign('university_id')
            ->references('id')->on('universities')->onDelete('cascade');
            $table->foreign('university_employee_id')
            ->references('id')->on('university_employees')->constrained()->onDelete('set null');
            $table->foreign('specialization_id')
            ->references('id')->on('specializations')->onDelete('cascade');
            $table->foreign('training_id')
            ->references('id')->on('trainings')->constrained()->onDelete('set null');
            $table->foreign('evaluate_student_id')
            ->references('id')->on('evaluate_students')->onDelete('cascade');
            $table->foreign('evaluate_company_id')
            ->references('id')->on('evaluate_companies')->onDelete('cascade');
            $table->foreign('city_id')
            ->references('id')->on('cities')->onDelete('cascade');
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
