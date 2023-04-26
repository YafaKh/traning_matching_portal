<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_branchs_departments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('branch_company_id');
            $table->foreign('branch_company_id')->references('id')->on('branchs')->onDelete('cascade');

            $table->unsignedBigInteger('department_company_id');
            $table->foreign('department_company_id')->references('id')->on('company_departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_branchs_departments');
    }
};