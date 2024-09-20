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
        Schema::create('tanamen', function (Blueprint $table) {
            $table->id();
            $table->string('no_ketukan');
            $table->string('jenis');
            $table->string('synonime');
            $table->string('famili');
            $table->string('nomor_vak');
            $table->string('nama_lokal');
            $table->string('keterangan');
            $table->string('lokasi')->default('Kebun Raya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanamen');
    }
};
