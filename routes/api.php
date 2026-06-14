<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourierController;
use App\Http\Controllers\Api\TrackingController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\Api\QRController;
use App\Http\Controllers\Api\NotificationController;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register/courier', [AuthController::class, 'registerCourier']);
Route::post('/register/customer', [AuthController::class, 'registerCustomer']);


Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Orders
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'myOrders']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);

    // Courier
    Route::get('/courier/orders', [CourierController::class, 'availableOrders']);
    Route::post('/courier/orders/{id}/accept', [CourierController::class, 'accept']);
    Route::post('/courier/orders/{id}/status', [CourierController::class, 'updateStatus']);

    // Tracking
    Route::post('/location', [TrackingController::class, 'updateLocation']);
    Route::get('/track/{id}', [TrackingController::class, 'track']);

    // QR
    Route::post('/order/{id}/pickup', [VerificationController::class, 'pickup']);
    Route::post('/order/{id}/delivery', [VerificationController::class, 'delivery']);
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/couriers', function () {
    return User::where('role', 'courier')->latest()->get();
    });
    Route::get('/admin/users', function () {
    return User::where('role', 'customer')->latest()->get();
});

    Route::get('/admin/orders', function () {
        return Order::with('customer')->latest()->get();
    });

    Route::post('/admin/orders/{id}/status', function ($id, Request $request) {

        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status
        ]);

        return response()->json(['success' => true]);
    });

});
Route::middleware('auth:sanctum')->group(function () {
        Route::get(
        '/notifications',
        [NotificationController::class, 'index']
    );

    // Route::post('/logout', [AuthController::class, 'logout']);

    // Orders
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/available', [OrderController::class, 'availableOrders']);
    Route::post('/orders/{id}/accept', [OrderController::class, 'acceptOrder']);
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus']);

    // Tracking
    Route::post('/location', [OrderController::class, 'updateLocation']);
    // Qr verification
    // Route::post('/order/{id}/pickup-scan', [QRController::class, 'pickup']);
// Route::post('/order/{id}/delivery-scan', [QRController::class, 'delivery']);

Route::get('/order/{id}/qr', [QRController::class, 'getQr']);
});
