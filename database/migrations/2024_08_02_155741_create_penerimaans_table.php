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
        Schema::create('penerimaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanaman');
            $table->string('suku');
            $table->string('habitus');
            $table->string('tempat_asal');
            $table->string('tanggal_terima');
            $table->string('xylarium_log');
            $table->string('xylarium_lempeng');
            $table->string('jumlah_material');
            $table->string('koordinat');
            $table->string('keterangan')->nullable();
            $table->enum('status',['Belum di cek','layak','tidak' ]);
            $table->foreignId('author_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaans');
    }
};
