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
        Schema::create('company_employee_name', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first', 45)->nullable(false);
            $table->string('second', 45)->nullable(false);
            $table->string('third', 45)->nullable(false);
            $table->string('last', 45)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_employee_name');
    }
};
