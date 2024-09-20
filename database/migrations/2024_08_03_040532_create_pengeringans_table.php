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
        Schema::create('pengeringans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->foreignId('tanaman_id')->constrained('tanamen');
            $table->foreignId('user_id')->constrained('users');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeringans');
    }
};
