<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_note_id',
        'shipment_date',
        'supplier_name',
        'supplier_address'
    ];

    public function returnNote()
    {
        return $this->belongsTo(ReturnNote::class);
    }
}
