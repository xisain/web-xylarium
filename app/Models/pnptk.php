<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pnptk extends Model
{
    use HasFactory;
    protected $table = 'pnptks';
    protected $fillable = [
        'tanaman_id',
        'xylarium_trapesium',
        'xylarium_utuh',
        'xylarium_dekatKulit',
        'xylarium_serbuk',
        'xylarium_prepat_sayatan',
        'xylarium_prepat_serat',
        'xylarium_potongan',
        'keterangan',
        'author_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'author_id');
    }
    public function tanaman(){
        return $this->belongsTo(tanaman::class);
    }
}
