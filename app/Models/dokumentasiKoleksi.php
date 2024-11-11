<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumentasiKoleksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanaman_id',
        'foto_pola',
        'foto_trapesium',
        'keterangan',
        'author_id'
    ];
    public function tanaman(){
        return $this->belongsTo(tanaman::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'author_id');
    }
}
