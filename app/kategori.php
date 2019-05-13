<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = [
        'id','nama','img', 'slug', 'sub','detail',
    ];
}
