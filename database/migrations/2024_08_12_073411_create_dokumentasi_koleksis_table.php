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
        Schema::create('dokumentasi_koleksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tanaman_id')->constrained('tanamen')->cascadeOnDelete();
            $table->string('foto_pola')->nullable();
            $table->string('foto_trapesium')->nullable();
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
        Schema::dropIfExists('dokumentasi_koleksis');
    }
};
