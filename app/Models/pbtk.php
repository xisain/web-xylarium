<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pbtk extends Model
{
    use HasFactory;
    protected $fillable = [
        "tanggal",
        "tanaman_id",
        "kegiatan_gergaji_trapesium",
        "kegiatan_gergaji_utuh",
        "kegiatan_hamplas_trapesium",
        "kegiatan_hamplas_utuh",
        "kegiatan_kubus",
        "jumlah_potongan",
        "user_id",
        "keterangan"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tanaman(){
        return $this->belongsTo(Tanaman::class);
    }
}
