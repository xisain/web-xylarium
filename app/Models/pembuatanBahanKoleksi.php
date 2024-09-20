<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembuatanBahanKoleksi extends Model
{
    use HasFactory;
    protected $table = 'pembuatan_bahan_koleksis';
   public function tanaman(){
        return $this->belongsTo(Tanaman::class, 'tanaman_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $fillable = [
        "tanggal",
        "tanaman_id",
        "kegiatan_gergaji",
        "kegiatan_hamplas",
        "jumlah_potongan",
        "user_id",
        "keterangan"

    ];

}
