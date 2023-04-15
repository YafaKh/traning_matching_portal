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
        Schema::create('company_employee', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email', 45)->nullable();
            $table->string('password', 45)->nullable();
            $table->char('phone', 10)->nullable();
            $table->string('first_name', 45)->nullable();
            $table->string('second_name', 45)->nullable();
            $table->string('third_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('country_code', 15)->nullable();
            $table->string('area_code', 15)->nullable();
            $table->string('phone_no', 15)->nullable();
            $table->string('type', 45)->nullable();
            $table->string('image', 45)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('branch_id')->references('id')->on('branch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_employee');
    }
};
