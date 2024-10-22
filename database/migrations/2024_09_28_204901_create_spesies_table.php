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
        Schema::create('spesies', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('genera');
            $table->string('spesies');
            $table->string('author_name');
            $table->string('infra_rank_species');
            $table->string('infra_rank_ephitet');
            $table->string('infra_rank_author');
            $table->string('margajenis');
            $table->string('jenis');
            $table->string('taxon_rank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spesies');
    }
};
