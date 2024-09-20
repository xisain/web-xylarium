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
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanaman_id')->constrained('tanamen')->cascadeOnDelete();
            $table->foreignId('pengeringan_id')->constrained('pengeringans')->cascadeOnDelete();
            $table->foreignId('pendinginan_id')->constrained('pendinginans')->cascadeOnDelete();
            $table->date('tanggal_pest_control');
            $table->date('tanggal_vacuum');
            $table->date('tanggal_fumigasi');
            $table->string('keterangan')->nullable();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaans');
    }
};
