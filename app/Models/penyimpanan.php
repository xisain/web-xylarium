<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyimpanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanaman_id',
        'tersimpan_koleksi_trapesium',
        'tersimpan_koleksi_utuh',
        'tersimpan_koleksi_dekatKulit',
        'tersimpan_koleksi_potongan',
        'tersimpan_koleksi_preparat_sayatan',
        'tersimpan_koleksi_preparat_serat',
        'tersimpan_koleksi_kubus',
        'tersimpan_koleksi_serbuk',
        'tersimpan_duplikat_trapesium',
        'tersimpan_duplikat_dekatKulit',
        'tersimpan_duplikat_utuh',
        'tersimpan_duplikat_potongan',
        'keterangan',
        'author_id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'author_id');
    }
    public function tanaman(){
        return $this->belongsTo(tanaman::class, 'tanaman_id');
    }
}
