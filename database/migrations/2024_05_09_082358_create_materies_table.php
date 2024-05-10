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
        Schema::create('materies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('category')->nullable();
            $table->string('sampul')->nullable();
            $table->string('file')->nullable();
            $table->string('akses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materies');
    }
};
