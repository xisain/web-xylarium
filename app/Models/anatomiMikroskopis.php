<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anatomiMikroskopis extends Model
{
    use HasFactory;

    protected $table = "anatomi_mikroskopis";
    protected $fillable = [
        'tanaman_id',
        'kegiatan_sayatan_tangen',
        'kegiatan_sayatan_radial',
        'kegiatan_sayatan_transversal',
        'kegiatan_serat_panjang',
        'kegiatan_serat_diameter',
        'kegiatan_serat_diameterLumen',
        'kegiatan_serat_dindingSerat',
        'kegiatan_serat_diameterPembuluh',
        'kegiatan_serat_panjangPembuluh',
        'keterangan',
        'author_id',
    ];

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class, 'tanaman_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    
}
