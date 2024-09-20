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
        Schema::create('penyimpanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanaman_id')->constrained("tanamen")->cascadeOnDelete();
            $table->string("tersimpan_koleksi_trapesium");
            $table->integer("tersimpan_koleksi_utuh");
            $table->integer("tersimpan_koleksi_dekatKulit");
            $table->integer("tersimpan_koleksi_potongan");
            $table->boolean("tersimpan_koleksi_preparat_sayatan")->default(false);
            $table->boolean("tersimpan_koleksi_preparat_serat")->default(false);
            $table->integer("tersimpan_koleksi_kubus");
            $table->boolean("tersimpan_koleksi_serbuk")->default(false);
            $table->string("tersimpan_duplikat_trapesium");
            $table->integer("tersimpan_duplikat_utuh");
            $table->integer("tersimpan_duplikat_dekatKulit");
            $table->integer("tersimpan_duplikat_potongan");
            $table->string("keterangan")->nullable();
            $table->foreignId('author_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyimpanans');
    }
};
