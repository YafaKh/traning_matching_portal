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
        Schema::create('unadded_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('industry', 45);
            $table->string('website')->nullable();
            $table->string('linkedin')->nullable();
            $table->char('phone', 15);
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unadded_companies');
    }
};
