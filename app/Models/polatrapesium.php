<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class polatrapesium extends Model
{
    use HasFactory;
    protected $table = 'polatrapesia';
    
    protected $fillable = [
        'tanggal',
        'tanaman_id',
        "user_id",
        "terpola_trapesium",
        "terpola_utuh",
        "terpola_kubus",
        "terpola_jumlah",
        "keterangan",
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
   public function tanaman(){
        return $this->belongsTo(Tanaman::class);
    }

}
