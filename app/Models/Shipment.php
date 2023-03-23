<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'place_of_arrival',
        'place_of_delivery',
        'delivery_date',
        'shipment_type_id',
        'shipment_status_id',


    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function type()
    {
        return $this->belongsTo(ShipmentType::class, 'shipment_type_id');
    }

    public function status()
    {
        return $this->belongsTo(ShipmentStatus::class, 'shipment_status_id');
    }

}
