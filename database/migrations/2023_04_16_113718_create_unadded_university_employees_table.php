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
        Schema::create('unadded_university_employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email', 45)->nullable();
            $table->string('password', 45)->nullable();
            $table->string('first_name', 45)->nullable();
            $table->string('second_name', 45)->nullable();
            $table->string('third_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unadded_university_employees');
    }
};
