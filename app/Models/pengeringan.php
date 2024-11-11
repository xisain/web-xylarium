<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeringan extends Model
{
    // pengeringan menggunakan data penomoran_koleksi dari tabel penomoranKoleksi lalu mencari data nama_tanaman, suku, habitus, tempat asal, dari tabel penerimaan
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tanaman(){
        return $this->belongsTo(tanaman::class);
    }

    use HasFactory;
    protected $fillable = [
        'tanggal_masuk',
        'tanggal_keluar',
        'tanaman_id',
        'user_id',
        'keterangan',
    ];

}
