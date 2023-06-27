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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',45);
            $table->integer('semester')->length(1);
            $table->year('year')->default(2023);
            $table->string('details')->nullable()->nullable();
            $table->boolean('active')->default(1);

            $table->unsignedBigInteger('company_employee_id')->nullable();
            $table->unsignedBigInteger('company_branch_id')->nullable();
            $table->unsignedBigInteger('training_field_id')->nullable();
            $table->foreign('company_employee_id')->references('id')->on('company_employees')->constrained()->onDelete('set null');
            $table->foreign('company_branch_id')->references('id')->on('company_branches');
            $table->foreign('training_field_id')->references('id')->on('training_fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
};
