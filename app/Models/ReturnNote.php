<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'damaged_product_id',
        'note_number',
        'purchase_date',
        'customer_name',
        'customer_phone_number',
        'price',
        'total',
        'status',
    ];
    

    public function damagedProduct()
{
    return $this->belongsTo(DamagedProduct::class);
}

public function shipmentRecord()
{
    return $this->hasOne(ShipmentRecord::class);
}

}
