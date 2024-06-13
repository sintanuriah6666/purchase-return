<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity', 'quality', 'product_code', 'supplier_id'];

    public function damagedProducts()
    {
        return $this->hasMany(DamagedProduct::class, 'product_code', 'product_code');
    }
}
