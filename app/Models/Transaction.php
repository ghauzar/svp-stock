<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'jenis_transaksi',
        'jumlah',
        'keterangan',
        'tanggal'
    ];

    public function product()
    {
        return $this->belongsTo(
            Product::class
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }
}