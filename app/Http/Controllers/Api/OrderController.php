<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // إنشاء طلب جديد
    public function store(Request $request)
{
    // if (!$request->pickup_lat || !$request->pickup_lng) {
    // return response()->json([
    //     'message' => 'Location required'
    // ], 422);
    // }
    $request->validate([
        'service_type_id' => 'required',
        'pickup_address' => 'nullable',
        'dropoff_address' => 'nullable',
        'price' => 'required'
    ]);

    $order = Order::create([
        'customer_id' => auth()->id(),
        'service_type_id' => $request->service_type_id,
        'pickup_address' => $request->pickup_address,
        'pickup_lat' => $request->pickup_lat,
        'pickup_lng' => $request->pickup_lng,
        'dropoff_address' => $request->dropoff_address,
        'dropoff_lat' => $request->dropoff_lat,
        'dropoff_lng' => $request->dropoff_lng,
        'price' => $request->price,
        'status' => 'pending',
    ]);

    // QR generation (مهم لاحقاً)
    $order->verification()->create([
        'pickup_code' => Str::uuid(),
        'delivery_code' => Str::uuid(),
    ]);

    
    // return response()->json($order);
    return redirect()->back()->with('success', 'Order created');
}
//  عرض الطلبات للمناديب
public function availableOrders()
{
    return Order::where('status', 'pending')->get();
}
// قبول الطلب من طرف المندوب
public function acceptOrder($id)
{
    $order = Order::findOrFail($id);

    if ($order->status !== 'pending') {
        return response()->json(['message' => 'Already taken'], 400);
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
// تحديث موقع المندوب
public function updateLocation(Request $request)
{
    OrderLocation::create([
        'order_id' => $request->order_id,
        'courier_id' => auth()->id(),
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
    ]);

    return response()->json(['success' => true]);
}
// عرض طلبات الزبون
public function myOrders()
{
    return Order::where('customer_id', auth()->id())
        ->latest()
        ->get();
}
// عرض طلبات المندوب
public function show($id)
{
    return Order::with([
        'customer',
        'courier',
        'serviceType',
        'locations',
        'verification'
    ])->findOrFail($id);
}

}
