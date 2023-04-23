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
        Schema::create('university_employee', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('employee_id', 45)->nullable(false);
            $table->string('email', 45)->nullable(false)->unique();
            $table->string('password', 45)->nullable(false);
            $table->string('first_name', 45)->nullable(false);
            $table->string('second_name', 45)->nullable(false);
            $table->string('third_name', 45)->nullable(false);
            $table->string('last_name', 45)->nullable(false);
            $table->string('image', 45)->nullable(false);
            
            $table->unsignedBigInteger('university_department_id');
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id')->references('id')->on('university');
            $table->foreign('university_department_id')->references('id')->on('university_department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_employee');
    }
};
