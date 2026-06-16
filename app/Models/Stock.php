<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'product_id',
        'jumlah',
        'tanggal_masuk',
        'tanggal_kadaluarsa'
    ];

    public function product()
    {
        return $this->belongsTo(
            Product::class
        );
    }
}