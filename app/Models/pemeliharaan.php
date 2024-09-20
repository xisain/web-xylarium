<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeliharaan extends Model
{
    use HasFactory;
    public function tanaman(){
        return $this->belongsTo(tanaman::class);

    }
    public function pendinginan(){
        return $this->belongsTo(pendinginan::class);
    }
    public function pengeringan(){
        return $this->belongsTo(pengeringan::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'author_id');
    }
    


    protected $fillable = [
        'tanaman_id',
        'pengeringan_id',
        'pendinginan_id',
        'tanggal_pest_control',
        'tanggal_vacuum',
        'tanggal_fumigasi',
        'keterangan',
        'author_id',
    ];

}
