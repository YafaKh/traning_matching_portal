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
        Schema::create('university_employee_student', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('student_student_id', 9);
            
            $table->unsignedBigInteger('university_employee_role_id');
            $table->foreign('student_student_id')->references('id')->on('student')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('university_employee_role_id')->references('id')->on('university_employee_role')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_employee_student');
    }
};
