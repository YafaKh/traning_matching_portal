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
        Schema::create('university_employee_roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('semester');
            $table->boolean('coordinator')->default(0);
            $table->boolean('supervisor')->default(0);
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
