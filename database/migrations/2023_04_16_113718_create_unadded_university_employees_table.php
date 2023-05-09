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
        Schema::create('unadded_university_employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email') ;
            $table->string('password', 45);
            $table->string('first_name', 45) ;
            $table->string('second_name', 45) ;
            $table->string('third_name', 45) ;
            $table->string('last_name', 45) ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unadded_university_employees');
    }
};
