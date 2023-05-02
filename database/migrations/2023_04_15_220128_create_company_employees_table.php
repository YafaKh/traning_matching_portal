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
            $table->string('email', 45)->nullable(false);
            $table->string('password', 45)->nullable(false);
            $table->char('phone', 10)->nullable(false);
            $table->string('first_name', 45)->nullable(false);
            $table->string('second_name', 45)->nullable(false);
            $table->string('third_name', 45)->nullable(false);
            $table->string('last_name', 45)->nullable(false);
            $table->string('country_code', 15)->nullable(false);
            $table->string('area_code', 15)->nullable(false);
            $table->string('phone_no', 15)->nullable(false);
            $table->string('type', 45)->nullable(false);
            $table->string('image', 45)->nullable(false);
            $table->boolean('contact_person')->default(0);

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('branch_id')->references('id')->on('branchs');
          
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
