<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi_detail extends Model
{
    protected $fillable = [
        'id','transaksi_id','produk_id', 'review', 'qty','catatan',
    ];
}
