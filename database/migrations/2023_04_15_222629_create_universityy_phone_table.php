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
        Schema::create('universityy_phone', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('country_code', 15)->nullable();
            $table->string('area_code', 15)->nullable();
            $table->string('phone_no', 15)->nullable();
            $table->string('type', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universityy_phone');
    }
};
