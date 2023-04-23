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
        Schema::create('visit', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('university_employee_id');
            $table->date('visit_date')->nullable(false);
            $table->time('visit_time')->nullable(false);
            $table->text('reports')->nullable(false);
            $table->string('contact_way', 45)->nullable(false);

            $table->foreign('student_id')
                ->references('id')
                ->on('student');
            $table->foreign('university_employee_id')
                ->references('id')
                ->on('university_employee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit');
    }
};
