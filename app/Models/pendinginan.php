<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendinginan extends Model
{
    use HasFactory;
    protected $table = 'pendinginans';
    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    protected $fillable = [
       "tanaman_id",
       'xylarium_bahan',
       'xylarium_koleksi',
       'xylarium_duplikat',
       'tanggal_masuk',
       'tanggal_keluar',
       'keterangan',
       'author_id'
    ];
}
