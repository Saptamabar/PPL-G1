<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('history_inventaris_tak_habis', function (Blueprint $table) {
            $table->id();
            $table->date('waktu_peminjaman');
            $table->date('waktu_pengembalian')->nullable();
            $table->foreignId('inventaris_tak_habis_id')->constrained('inventaris_tak_habis')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history_inventaris_tak_habis');
    }
};
