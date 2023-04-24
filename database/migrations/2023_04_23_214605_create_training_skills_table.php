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
        Schema::create('training_skills', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('evaluate_company_id');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('evaluate_company_id')->references('id')->on('evaluate_companies');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_skills');
    }
};
