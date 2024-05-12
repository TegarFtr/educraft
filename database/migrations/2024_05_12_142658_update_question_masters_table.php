<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('question_masters', function (Blueprint $table) {
            $table->longText('exam_id')->nullable()->change();
            $table->longText('questions')->nullable()->change();
            $table->longText('ans')->nullable()->change();
            $table->longText('options')->nullable()->change();
            $table->longText('status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('question_masters', function (Blueprint $table) {
            $table->string('exam_id')->nullable()->change();
            $table->string('questions')->nullable()->change();
            $table->string('ans')->nullable()->change();
            $table->string('options')->nullable()->change();
            $table->string('status')->nullable()->change();
        });
    }
};
