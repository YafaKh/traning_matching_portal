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
            $table->string('name',45)->nullable(false);
            $table->integer('semester')->length(1);
            $table->string('training_feild',45)->nullable(false);
            $table->string('details')->nullable(false);


            $table->unsignedBigInteger('company_employee_id');
            $table->unsignedBigInteger('branch_department_id');
            $table->foreign('company_employee_id')->references('id')->on('company_employees');
            $table->foreign('branch_department_id')
            ->references('id')->on('company_branchs_departments');


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
