<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'category_id',
        'harga',
        'stok_total',   
        'stok_minimum'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
