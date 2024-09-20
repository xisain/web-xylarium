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
        Schema::create('pnptks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanaman_id')->constrained('tanamen')->cascadeOnDelete();
            $table->string('xylarium_trapesium');
            $table->string('xylarium_utuh');
            $table->string('xylarium_serbuk');
            $table->string('xylarium_dekatKulit');
            $table->string('xylarium_prepat_sayatan');
            $table->string('xylarium_prepat_serat');
            $table->string('xylarium_potongan');
            $table->string('keterangan')->nullable();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnptks');
    }
};
