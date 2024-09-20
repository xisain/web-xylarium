<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class penomoranKoleksi extends Model
{
    use HasFactory;
    protected $table = 'penomoran_koleksis';
    public function penerimaan()
    {
        return $this->belongsTo(Penerimaan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    protected $fillable = [
        "date",
        "penerimaan_id",
        "nomor_koleksi",
        "keterangan",
        "author_id"
    ];
}
