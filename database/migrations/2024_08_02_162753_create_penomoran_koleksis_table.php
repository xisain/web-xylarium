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
        Schema::create('penomoran_koleksis', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('penerimaan_id')->constrained('penerimaans')->onDelete('cascade'); // Foreign key to penerimaan table
            $table->string('nomor_koleksi'); // Column for collection number
            $table->text('keterangan')->nullable(); // Column for additional information
            $table->foreignId('author_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penomoran_koleksis');
    }
};
