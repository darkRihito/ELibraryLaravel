<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bibliografi(){
        return $this->belongsTo('App\Models\Bibliografi');
    }
    public function koleksi(){
        return $this->belongsTo('App\Models\Peminjaman');
    }
}
