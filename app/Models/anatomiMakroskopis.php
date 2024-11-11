<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anatomiMakroskopis extends Model
{
    use HasFactory;
    protected $fillable = [
        "tanaman_id",
        "tangen_images",
        "radial_images",
        "transversal_images",
        "keterangan",
        "author_id"
    ];

    public function User(){
        return $this->belongsTo(User::class,"author_id");
    }
    public function tanaman(){
        return $this->belongsTo(tanaman::class);
    }

}
