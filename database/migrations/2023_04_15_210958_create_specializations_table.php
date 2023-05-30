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
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 45);
            $table->string('acronyms', 10);
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id')
                ->references('id')->on('universities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specializations');
    }
};
