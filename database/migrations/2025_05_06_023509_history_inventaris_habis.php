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
        Schema::create('history_inventaris_habis', function (Blueprint $table) {
            $table->id();
            $table->date('waktu_penggunaan');
            $table->integer('jumlah');
            $table->foreignId('inventaris_habis_id')->constrained('inventaris_habis')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_inventaris_habis');
    }
};
