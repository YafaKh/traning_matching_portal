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
        Schema::create('preferred_company_student', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('preferred_company_id');
            $table->foreign('preferred_company_id', 'fk_preferred_company_student_preferred_company1')
                ->references('id')
                ->on('preferred_company')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('student_id', 'fk_preferred_company_student_student1')
                ->references('id')
                ->on('student');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferred_company_student');
    }
};