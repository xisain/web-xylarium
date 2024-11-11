<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaan extends Model
{
    use HasFactory;
    protected $table = 'penerimaans';
    public function penomoranKoleksi()
    {
        return $this->hasOne(penomoranKoleksi::class);
    }
    protected $fillable = [
        'nama_tanaman',
        'suku',
        'habitus',
        'tempat_asal',
        'tanggal_terima',
        'xylarium_log',
        'xylarium_lempeng',
        'jumlah_material',
        'Koordinat',
        'keterangan',
        'status',
        'author_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
