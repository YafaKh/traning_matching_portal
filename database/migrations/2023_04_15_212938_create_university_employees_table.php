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
        Schema::create('university_employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('employee_num', 45);
            $table->string('email', 45)->unique();
            $table->string('phone', 15);
            $table->string('password', 45);
            $table->string('first_name', 45);
            $table->string('second_name', 45);
            $table->string('third_name', 45);
            $table->string('last_name', 45);
            $table->string('image')->nullable();
            
            $table->unsignedBigInteger('university_department_id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('employees_roles');
            $table->foreign('university_id')->references('id')->on('universities');
            $table->foreign('university_department_id')->references('id')->on('university_departments');
            $table->foreign('employees_roles')->references('id')->on('university_employee_roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_employees');
    }
};
