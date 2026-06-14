<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;

class QRController extends Controller
{
    public function getQr($id)
    {
        $order = Order::with('verification')->findOrFail($id);

        if (auth()->id() !== $order->customer_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return response()->json([
            'pickup_qr' =>
                "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data="
                . urlencode($order->verification->pickup_code),

            'delivery_qr' =>
                "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data="
                . urlencode($order->verification->delivery_code),
        ]);
    }
}