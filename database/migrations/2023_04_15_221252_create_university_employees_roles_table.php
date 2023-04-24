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
        Schema::create('university_employees_roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('semester')->nullable(false);
 
            $table->unsignedBigInteger('university_role_id');
            $table->unsignedBigInteger('university_employee_id');
            $table->foreign('university_role_id')->references('id')->on('university_roles');
            $table->foreign('university_employee_id')->references('id')->on('university_employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_employees_roles');
    }
};
