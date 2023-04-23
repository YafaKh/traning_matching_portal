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
        Schema::create('university_phone', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('country_code', 15)->nullable(false);
            $table->string('area_code', 15)->nullable(false);
            $table->string('phone_no', 15)->nullable(false);
            $table->string('type', 45)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_phone');
    }
};
