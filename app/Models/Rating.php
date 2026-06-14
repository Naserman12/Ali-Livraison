<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function order()
{
    return $this->belongsTo(Order::class);
}

public function customer()
{
    return $this->belongsTo(User::class, 'customer_id');
}

public function courier()
{
    return $this->belongsTo(User::class, 'courier_id');
}
}
