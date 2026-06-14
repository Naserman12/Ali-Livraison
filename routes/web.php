<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [OrderController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');
// هذه المسارات خاصة بالملف الشخصي للمستخدم
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// الآن سنقوم بإنشاء مسارات خاصة بالمسؤول

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn () =>
        Inertia::render('Admin/Dashboard')
    );

    Route::get('/admin/orders', fn () =>
        Inertia::render('Admin/Orders')
    );
    Route::get('/admin/dashboard', fn () =>
    Inertia::render('Admin/Dashboard')
    );

    Route::get('/admin/orders', fn () =>
        Inertia::render('Admin/Orders')
    );

    Route::get('/admin/users', fn () =>
        Inertia::render('Admin/Users')
    );

    Route::get('/admin/couriers', fn () =>
        Inertia::render('Admin/Couriers')
    );
    Route::patch(
    '/admin/users/{user}/role',
    [OrderController::class, 'updateRole']
    );
});
// من أجل الزبائن

Route::middleware(['auth'])->group(function () {
    

    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/customer/dashboard', function () {
        return Inertia::render('Customer/Dashboard');
    });

    Route::get('/customer/orders/create', function () {
        return Inertia::render('Customer/CreateOrder');
    });

    Route::get('/customer/orders', function () {
        return Inertia::render('Customer/MyOrders');
    });

    Route::get('/customer/orders/{id}', function ($id) {
        return Inertia::render('Customer/OrderDetails', [
            'id' => $id
        ]);
    });

});
// من أجل المناديب
Route::middleware(['auth'])->group(function () {

    Route::get('/courier/dashboard', function () {
        return Inertia::render('Courier/Dashboard');
    });

    Route::get('/courier/orders', function () {
        return Inertia::render('Courier/AvailableOrders');
    });

    Route::get('/courier/active', function () {
        return Inertia::render('Courier/ActiveOrder');
    });

});
require __DIR__.'/auth.php';
