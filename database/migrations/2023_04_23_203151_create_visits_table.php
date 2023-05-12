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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('visit_date') ;
            $table->time('visit_time') ;
            $table->text('report')->nullable();
            $table->string('contact_way', 45)->nullable();
            $table->unsignedBigInteger('student_id');
          //  $table->unsignedBigInteger('university_employee_id');

            $table->foreign('student_id')
                ->references('id')
                ->on('students');
           // $table->foreign('university_employee_id')->references('id')->on('university_employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
