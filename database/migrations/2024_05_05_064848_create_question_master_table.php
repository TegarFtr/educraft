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
        Schema::create('question_masters', function (Blueprint $table) {
            $table->id();
            $table->string('exam_id')->nullable();
            $table->string('questions')->nullable();
            $table->string('ans')->nullable();
            $table->string('options')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_master');
    }
};
