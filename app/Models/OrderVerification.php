<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class OrderVerification extends Model
{
   use HasFactory;

    protected $fillable = [
        'order_id',
        'pickup_code',
        'delivery_code',
        'pickup_verified_at',
        'delivery_verified_at',
    ];    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
