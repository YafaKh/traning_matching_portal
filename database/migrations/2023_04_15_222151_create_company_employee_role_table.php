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
        Schema::create('company_employee_role', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('company_role_id');
            $table->unsignedBigInteger('company_employee_id');
            $table->foreign('company_role_id')->references('id')->on('company_role')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('company_employee_id')->references('id')->on('company_employee')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_employee_role');
    }
};
