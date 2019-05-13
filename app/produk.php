<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $fillable = [
    'id','nama','detail', 'img', 'harga','stok','kat_id','warung_id','slug',
    ];
}
