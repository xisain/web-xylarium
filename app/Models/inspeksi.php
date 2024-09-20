<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inspeksi extends Model
{
    use HasFactory;
    protected $fillable = [
        "tanaman_id",
        "identifikasi_koleksi",
        "kondisi_koleksi",
        "trapesium_koleksi",
        "trapesium_duplikat",
        "duplikasi_no_koleksi",
        "koleksi_serbuk",
        "preparat_koleksi_sayatan",
        "preparat_koleksi_serat",
        "kubus",
        "keterangan",
        "author_id"
    ];

    public function tanaman(){
        return $this->belongsTo(tanaman::class,"tanaman_id");
    }
    public function user(){
        return $this->belongsTo(User::class,"author_id");
    }
}
