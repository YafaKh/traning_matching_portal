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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 45)->nullable(false);
            $table->string('Industry', 45)->nullable(false);
            $table->string('description', 200)->nullable(false);
            $table->string('website', 45)->nullable(false);
            $table->string('linkedin', 45)->nullable();
            $table->string('image', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
