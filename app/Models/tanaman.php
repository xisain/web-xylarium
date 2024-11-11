<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;
    protected $table = 'tanamen';

    public function penerimaan()
    {
        return $this->belongsTo(penerimaan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function penomoranKoleksi()
    {
        return $this->belongsTo(penomoranKoleksi::class);
    }

    public function pengeringan()
    {
        return $this->hasMany(pengeringan::class); // or hasMany if there are multiple
    }

    public function pendinginan()
    {
        return $this->hasMany(pendinginan::class); // or hasMany if there are multiple
    }

    protected $fillable = [
        'no_ketukan',
        'jenis',
        'synonime',
        'famili',
        'lokasi',
        'nomor_vak',
        'nama_lokal',
        'keterangan'
    ];
}
