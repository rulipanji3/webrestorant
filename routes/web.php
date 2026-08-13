<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MenuItemController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('warung-makan');
});

Route::get('/warung-makan-mba-neni', function () {
    return view('warung-makan');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::post('/booking', [BookingController::class, 'store'])->middleware('throttle:10,1')->name('booking.store');

Route::get('/menu/available/ids', [MenuItemController::class, 'availableIds']);
Route::get('/menu/{menuItem}', [MenuItemController::class, 'show'])->name('menu.show');

Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('throttle:20,1');

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login.show');
Route::post('/admin/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('admin.login');
Route::post('/admin/logout', [AuthController::class, 'logout'])->middleware('admin')->name('admin.logout');

Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin', fn () => redirect()->route('admin.orders.index'))->name('admin.dashboard');
    Route::get('/admin/orders', [CheckoutController::class, 'index'])->name('admin.orders.index');
    Route::delete('/admin/orders', [CheckoutController::class, 'destroyAll'])->name('admin.orders.destroyAll');
    Route::delete('/admin/orders/{order}', [CheckoutController::class, 'destroy'])->name('admin.orders.destroy');
    Route::get('/admin/menu', [MenuItemController::class, 'index'])->name('admin.menu.index');
    Route::get('/admin/menu/availability', [MenuItemController::class, 'availability'])->name('admin.menu.availability');
    Route::post('/admin/menu', [MenuItemController::class, 'store'])->name('admin.menu.store');
    Route::get('/admin/menu/{menuItem}/edit', [MenuItemController::class, 'edit'])->name('admin.menu.edit');
    Route::put('/admin/menu/{menuItem}', [MenuItemController::class, 'update'])->name('admin.menu.update');
    Route::delete('/admin/menu/{menuItem}', [MenuItemController::class, 'destroy'])->name('admin.menu.destroy');
    Route::put('/admin/menu/{menuItem}/toggle', [MenuItemController::class, 'toggleAvailability'])->name('admin.menu.toggle');
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::delete('/admin/bookings/{booking}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
});
