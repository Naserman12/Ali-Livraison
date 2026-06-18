<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderController extends Controller
{
    // عرض الصفحة الرئيسية
        public function index()
    {
        $user = Auth::user();

        return match (true) {
            $user->hasRole('admin') => redirect()->route('admin.dashboard'),
            $user->hasRole('courier') => redirect()->route('courier.dashboard'),
            default => redirect()->route('customer.dashboard'),
        };
    }
    // تحديث دور المستخدم
    public function updateRole(Request $request, User $user)
    {
        if($user->hasRole('admin')) return
        $user->assignRole($request->role);
        return back();
    }
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
public function courierActiveOrders(){
    return Auth::user()
            ->courierOrders()
            ->whereNotIn('status', ['delivered', 'cancelled'])
            ->latest()->get();
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
      $user = auth()->user();

    // إذا كان عميل
    if ($user->hasRole('customer')) {
        return Order::where('customer_id', $user->id)
            ->latest()
            ->get();
    }

    // إذا كان مندوب
    if ($user->hasRole('courier')) {
        return Order::where('courier_id', $user->id)
            ->latest()
            ->get();
    }
    return [];
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
