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
        Schema::create('inspeksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanaman_id')->constrained('tanamen');
            $table->string('identifikasi_koleksi');
            $table->string('kondisi_koleksi');
            $table->string('trapesium_koleksi');
            $table->string('trapesium_duplikat');
            $table->string('duplikasi_no_koleksi');
            $table->string('koleksi_serbuk');
            $table->string('preparat_koleksi_sayatan');
            $table->string('preparat_koleksi_serat');
            $table->string('kubus');
            $table->string('keterangan');
            $table->foreignId('author_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspeksis');
    }
};
