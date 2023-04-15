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
        Schema::create('company_employee_phone', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('country_code', 15)->nullable();
            $table->string('area_code', 15)->nullable();
            $table->string('phone_no', 15)->nullable();
            $table->string('type', 45)->nullable();
            
            $table->unsignedBigInteger('company_employee_id');
            $table->foreign('company_employee_id')->references('id')->on('company_employee')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_employee_phone');
    }
};
