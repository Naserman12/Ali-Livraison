<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class VerificationController extends Controller
{
    public function show($id)
    {
        $order = Order::with('verification')->findOrFail($id);

        if (auth()->id() !== $order->customer_id &&
            auth()->id() !== $order->courier_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json($order);
    }

    public function pickup(Request $request, $id)
    {
        $order = Order::with('verification')->findOrFail($id);

        if ($request->code !== $order->verification->pickup_code) {
            return response()->json(['message' => 'Invalid QR'], 400);
        }

        if ($order->status !== 'courier_arrived') {
            return response()->json(['message' => 'Invalid state'], 400);
        }

        $order->update(['status' => 'picked_up']);

        $order->verification->update([
            'pickup_verified_at' => now()
        ]);

        return response()->json(['message' => 'Pickup confirmed']);
    }

    public function delivery(Request $request, $id)
    {
        $order = Order::with('verification')->findOrFail($id);

        if ($request->code !== $order->verification->delivery_code) {
            return response()->json(['message' => 'Invalid QR'], 400);
        }

        if ($order->status !== 'arrived_destination') {
            return response()->json(['message' => 'Invalid state'], 400);
        }

        $order->update(['status' => 'delivered']);

        $order->verification->update([
            'delivery_verified_at' => now()
        ]);

        return response()->json(['message' => 'Delivered successfully']);
    }
}
