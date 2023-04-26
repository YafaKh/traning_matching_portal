<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_name', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_arabic_name', 45)->nullable(false);
            $table->string('first_english_name', 45)->nullable(false);
            $table->string('second_arabic_name', 45)->nullable(false);
            $table->string('second_english_name', 45)->nullable(false);
            $table->string('third_arabic_name', 45)->nullable(false);
            $table->string('third_english_name', 45)->nullable(false);
            $table->string('last_arabic_name', 45)->nullable(false);
            $table->string('last_english_name', 45)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_name');
    }
};
