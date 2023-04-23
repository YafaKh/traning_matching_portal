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
        Schema::create('training', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('semester',20)->nullable(false);
            $table->string('training_feild',45)->nullable(false);
            $table->string('details')->nullable(false);
            $table->date('start_date')->nullable(false);
            $table->date('end_date')->nullable(false);



            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('company_employee_id');
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('company_employee_id')->references('id')->on('company_employee');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training');
    }
};
