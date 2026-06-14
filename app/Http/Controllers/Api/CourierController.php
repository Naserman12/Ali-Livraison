<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    // عرض الطلبات المتاحة للمندوب
    public function availableOrders()
{
    return Order::where('status', 'pending')->latest()->get();
}
// قبول الطلب من طرف المندوب
public function accept($id)
{
    $order = Order::findOrFail($id);

    if ($order->status !== 'pending') {
        return response()->json(['message' => 'Not available'], 400);
    }

    $order->update([
        'courier_id' => auth()->id(),
        'status' => 'accepted'
    ]);

    return response()->json($order);
}
// تحديث حالة الطلب
public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $order->update([
        'status' => $request->status
    ]);

    return response()->json($order);
}
}
