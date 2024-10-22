<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'genera',
        'spesies',
        'author_name',
        'infra_rank_species',
        'infra_rank_ephitet',
        'infra_rank_author',
        'margajenis',
        'jenis',
        'taxon_rank',
    ];
}
