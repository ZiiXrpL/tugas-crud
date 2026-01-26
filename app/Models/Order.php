<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // kolom yang boleh di-isi
    protected $fillable = [
        'customer',
        'total_order',
        'product_id'
    ];

    // relasi ke product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
