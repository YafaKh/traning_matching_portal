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
        Schema::create('university_department', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 45)->nullable();
           
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id', 'fk_university_department_university1')
                ->references('id')->on('university');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_department');
    }
};
