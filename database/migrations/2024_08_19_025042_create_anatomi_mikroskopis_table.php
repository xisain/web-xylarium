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
        Schema::create('anatomi_mikroskopis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanaman_id')->constrained('tanamen');
            $table->string('kegiatan_sayatan_tangen')->nullable();
            $table->string('kegiatan_sayatan_radial')->nullable();
            $table->string('kegiatan_sayatan_transversal')->nullable();
            $table->string('kegiatan_serat_panjang')->nullable();
            $table->string('kegiatan_serat_diameter')->nullable();
            $table->string('kegiatan_serat_diameterLumen')->nullable();
            $table->string('kegiatan_serat_dindingSerat')->nullable();
            $table->string('kegiatan_serat_diameterPembuluh')->nullable();
            $table->string('kegiatan_serat_panjangPembuluh')->nullable();
            $table->string('keterangan')->nullable();
            $table->foreignId('author_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anatomi_mikroskopis');
    }
};
