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
        Schema::create('polatrapesia', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('tanaman_id')->constrained('tanamen');
            $table->foreignId('user_id')->constrained('users');
            $table->string('terpola_trapesium');
            $table->string('terpola_utuh');
            $table->string('terpola_kubus');
            $table->string('terpola_jumlah');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polatrapesia');
    }
};
