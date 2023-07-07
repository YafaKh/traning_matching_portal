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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('visit_date') ;
            $table->time('visit_time') ;
            $table->text('report')->nullable();
            $table->boolean('contact_way')->defualt(1);// 0 is online and 1 is on-site
            $table->unsignedBigInteger('student_id');

            $table->foreign('student_id')
                ->references('id')
                ->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
