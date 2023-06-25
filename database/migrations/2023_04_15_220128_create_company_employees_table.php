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
            $table->rememberToken();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('phone', 15);
            $table->string('first_name', 45);
            $table->string('second_name', 45);
            $table->string('third_name', 45) ;
            $table->string('last_name', 45);
            $table->string('image')->nullable();
            $table->boolean('contactable')->default(0);
            $table->boolean('active')->default(1);

            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('company_employee_role_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('company_employee_role_id')->references('id')->on('company_employee_roles');
        
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
