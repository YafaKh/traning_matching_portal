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
        Schema::create('university_employee_role', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('semester')->nullable();
 
            $table->unsignedBigInteger('university_role_id');
            $table->unsignedBigInteger('university_employee_id');
            $table->foreign('university_role_id')->references('id')->on('university_role');
            $table->foreign('university_employee_id')->references('id')->on('university_employee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_employee_role');
    }
};
