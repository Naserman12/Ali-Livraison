<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'customer_id',
    'courier_id',
    'service_type_id',

    'pickup_address',
    'pickup_lat',
    'pickup_lng',

    'dropoff_address',
    'dropoff_lat',
    'dropoff_lng',

    'distance',
    'price',
    'status',
    'notes'
];
public function customer()
{
    return $this->belongsTo(User::class, 'customer_id');
}
public function courier()
{
    return $this->belongsTo(User::class, 'courier_id');
}

public function serviceType()
{
    return $this->belongsTo(ServiceType::class);
}

public function locations()
{
    return $this->hasMany(OrderLocation::class);
}

public function logs()
{
    return $this->hasMany(OrderStatusLog::class);
}

public function images()
{
    return $this->hasMany(OrderImage::class);
}

public function payment()
{
    return $this->hasOne(Payment::class);
}

public function verification()
{
    return $this->hasOne(OrderVerification::class);
}

public function rating()
{
    return $this->hasOne(Rating::class);
}
}
