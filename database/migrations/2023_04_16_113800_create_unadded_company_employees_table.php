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
        Schema::create('unadded_company_employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email') ;
            $table->char('phone', 15);
            $table->string('password') ;
            $table->string('first_name', 45) ;
            $table->string('second_name', 45) ;
            $table->string('third_name', 45) ;
            $table->string('last_name', 45) ;
            $table->string('image')->nullable();
            $table->boolean('company_addition')->default(1);
            $table->unsignedBigInteger('company_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unadded_company_employees');
    }
};
