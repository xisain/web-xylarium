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
        Schema::create('pembuatan_bahan_koleksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('tanaman_id')->constrained('tanamen');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('kegiatan_gergaji');
            $table->integer('kegiatan_hamplas');
            $table->string('jumlah_potongan');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembuatan_bahan_koleksis');
    }
};
