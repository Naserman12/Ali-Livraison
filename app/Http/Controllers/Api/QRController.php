<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    public function pickup(Request $request, $id)
{
    $order = Order::with('verification')->findOrFail($id);
    if ($order->courier_id !== auth()->id()) {
        abort(403);
    }

    if ($request->code !== $order->verification->pickup_code) {

        return response()->json(['message' => 'Invalid QR'], 400);
    }

    if ($order->status !== 'courier_arrived') {
        return response()->json(['message' => 'Invalid state'], 400);
    }
    return Inertia::render('Courier/ScanPickupQR', [
        'order' => $order
    ]);
}
public function delivery(Request $request, $id)
{
    $order = Order::with('verification')->findOrFail($id);
    if ($order->courier_id !== auth()->id()) {
        abort(403);
    }

    $order = Order::with('verification')->findOrFail($id);
    if ($request->code !== $order->verification->delivery_code) {
        return response()->json(['message' => 'Invalid QR'], 400);
    }   
        return Inertia::render('Courier/ScanDeliveryQR', [
        'order' => $order
    ]);
}
}