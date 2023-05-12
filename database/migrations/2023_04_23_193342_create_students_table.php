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
            $table->boolean('gender')->nullable(false);
            $table->integer('passed_hours')->nullable(false);
            $table->float('gpa')->nullable(false);
            $table->string('address', 45)->nullable(false);
            $table->string('email', 45)->unique()->nullable(false);
            $table->string('password', 45)->nullable(false);
            $table->date('availability_date')->nullable(false);
            $table->boolean('connected_with_a_company')->nullable(false);
            $table->string('connected_company_info', 100)->nullable();
            $table->string('country_code', 15)->nullable();
            $table->string('area_code', 15)->nullable();
            $table->string('phone_no', 15)->nullable(false);
            $table->boolean('registered')->nullable(false)->default(0);
            $table->string('image', 45)->nullable(false);

            $table->unsignedBigInteger('student_name_id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('specialization_id');
            $table->unsignedBigInteger('training_id');
            $table->foreign('student_name_id')
            ->references('id')->on('student_name');
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
