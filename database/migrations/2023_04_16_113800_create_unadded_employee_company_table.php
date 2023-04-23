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
        Schema::create('unadded_employee_company', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email', 45)->nullable(false);
            $table->string('password', 45)->nullable(false);
            $table->string('first_name', 45)->nullable(false);
            $table->string('second_name', 45)->nullable(false);
            $table->string('third_name', 45)->nullable(false);
            $table->string('last_name', 45)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unadded_employee_company');
    }
};
