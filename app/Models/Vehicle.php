<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
   public function courier()
{
    return $this->belongsTo(User::class, 'courier_id');
}
}
