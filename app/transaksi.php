<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = [
        'id','user_id', 'pembayaran', 'pengiriman','biaya_antar','warung_id',"status",
    ];
}
