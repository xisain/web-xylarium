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
        Schema::create('pbtks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('tanaman_id')->constrained('tanamen');    
            $table->string('kegiatan_gergaji_trapesium');
            $table->string('kegiatan_gergaji_utuh');
            $table->string('kegiatan_hamplas_trapesium');
            $table->string('kegiatan_hamplas_utuh');
            $table->string('kegiatan_kubus');
            $table->string('jumlah_potongan');
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
        Schema::dropIfExists('pbtks');
    }
};
