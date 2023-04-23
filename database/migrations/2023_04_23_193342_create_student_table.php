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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('student_id', 12)->unique();
            $table->binary('gender')->nullable(false);
            $table->integer('passed_hours')->nullable(false);
            $table->float('gpa')->nullable(false);
            $table->string('address', 45)->nullable(false);
            $table->string('email', 45)->unique()->nullable(false);
            $table->string('password', 45)->nullable(false);
            $table->date('availability_date')->nullable(false);
            $table->binary('connected_with_a_company')->nullable(false);
            $table->string('connected_company_info', 100)->nullable();
            $table->string('first_arabic_name', 45)->nullable(false);
            $table->string('first_english_name', 45)->nullable(false);
            $table->string('second_arabic_name', 45)->nullable(false);
            $table->string('second_english_name', 45)->nullable(false);
            $table->string('third_arabic_name', 45)->nullable(false);
            $table->string('third_english_name', 45)->nullable(false);
            $table->string('last_arabic_name', 45)->nullable(false);
            $table->string('last_english_name', 45)->nullable(false);
            $table->string('country_code', 15)->nullable(false);
            $table->string('area_code', 15)->nullable(false);
            $table->string('phone_no', 15)->nullable(false);
            $table->binary('registered')->nullable(false)->default(0);
            $table->string('image', 45)->nullable(false);

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('specialization_id');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('company_id')
            ->references('id')->on('company');
            $table->foreign('university_id')
            ->references('id')->on('university');
            $table->foreign('specialization_id')
            ->references('id')->on('specialization');
            $table->foreign('branch_id')
            ->references('id')->on('branch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
