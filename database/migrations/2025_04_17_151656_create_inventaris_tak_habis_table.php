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
        Schema::create('inventaris_tak_habis', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('kode')->unique();
            $table->enum('status',['tidak tersedia','tersedia'])->default('tersedia');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris_tak_habis');
    }

    
};
