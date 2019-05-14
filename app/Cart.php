<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'id','user_id','produk_id', 'qty', 'catatan',
    ];
}
