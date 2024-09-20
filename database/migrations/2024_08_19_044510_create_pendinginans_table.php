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
        Schema::create('pendinginans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanaman_id')->constrained('tanamen');
            $table->string('xylarium_bahan');
            $table->string('xylarium_koleksi');
            $table->string('xylarium_duplikat');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->foreignId('author_id')->constrained('users');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendinginans');
    }
};
