<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibliografi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function koleksis(){
        return $this->hasMany('App\Models\Koleksi');
    }
    
}
