<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Order;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('orders.{id}', function ($user, $id) {

    $order = Order::find($id);

    return $user->id === $order->customer_id
        || $user->id === $order->courier_id;
});
