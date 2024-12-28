<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::post('/login',    [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', function () {
    return view('Admin/login');
});
Route::get('/dashboard', function () {
    return view('Admin/dashboard');
});














Route::get('/', function () {
    return view('User.home');
});
Route::get('/', [MenuController::class, 'home']);

Route::get('/contact', function () {
    return view('User/contact');
});
Route::get('/apply', function () {
    return view('User/apply');
});
Route::get('/supplier', function () {
    return view('User/supplier');
});
Route::get('/cart', function () {
    return view('User/cart');
});
Route::get('menu', [MenuController::class, 'userData']);
Route::post('/order', [OrderController::class, 'insertOrder']);

Route::middleware('admin')->group(function () {
    Route::get('/admin/order', [OrderController::class, 'index']);
    Route::get('/order/{id}', [OrderController::class, 'orderDetails']);
    Route::post('/updateStatus/{orderId}', [OrderController::class, 'updateStatus']);

    Route::get('/admin/category', [CategoriesController::class, 'index']);
    Route::get('admin/menu', [MenuController::class, 'index']);
    Route::post('addMenu', [MenuController::class, 'insert']);
    Route::post('updateMenu/{id}', [MenuController::class, 'update']);
    Route::get('/deleteMenu/{id}', [MenuController::class, 'delete']);
    Route::post('/addCategory', [CategoriesController::class, 'insert']);
    Route::post('/updateCategory/{id}', [CategoriesController::class, 'update']);
    Route::get('/deleteCategory/{id}', [CategoriesController::class, 'delete']);
});
