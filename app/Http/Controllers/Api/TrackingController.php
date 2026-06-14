<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderLocation;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    
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
//  عرض تتبع الطلب
public function track($id)
{
    return OrderLocation::where('order_id', $id)
        ->latest()
        ->get();
}
}
