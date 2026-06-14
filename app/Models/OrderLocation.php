<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLocation extends Model
{
    public function order()
{
    return $this->belongsTo(Order::class);
}

public function courier()
{
    return $this->belongsTo(User::class, 'courier_id');
}
}
