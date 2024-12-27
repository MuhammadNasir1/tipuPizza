<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin/dashboard');
});
Route::get('layout', function () {
    return view('Admin/layout');
});
Route::get('admin/category', [CategoriesController::class, 'index']);
Route::post('addCategory', [CategoriesController::class, 'insert']);
Route::get('menu', function () {
    return view('Admin/menu');
});
Route::get('login', function () {
    return view('Admin/login');
});
