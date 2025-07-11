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
        Schema::create('data_anggrek', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggrek')->unique();
            $table->string('foto')->nullable();
            $table->string('nama_latin');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_anggrek');
    }
};
