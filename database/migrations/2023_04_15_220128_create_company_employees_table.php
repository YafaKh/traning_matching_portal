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
        Schema::create('company_employees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email', 45);
            $table->string('password', 45);
            $table->char('phone', 15);
            $table->string('first_name', 45);
            $table->string('second_name', 45);
            $table->string('third_name', 45) ;
            $table->string('last_name', 45);
            $table->string('type', 45);
            $table->string('image', 45)->nullable();
            $table->boolean('contact_person')->default(0);

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('employees_roles');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('employees_roles')->references('id')->on('company_employees_roles');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_employees');
    }
};
