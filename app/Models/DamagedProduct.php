<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamagedProduct extends Model
{
    use HasFactory;

    protected $fillable = ['supplier_id', 'product_code', 'quantity', 'note'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_code', 'product_code');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    

    public function returnNote()
    {
        return $this->hasOne(ReturnNote::class);
    }

}
