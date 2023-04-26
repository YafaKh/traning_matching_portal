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
        Schema::create('company_roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('hr')->nullable(false)->default(0);
            $table->boolean('trainer')->nullable(false)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_roles');
    }
};
