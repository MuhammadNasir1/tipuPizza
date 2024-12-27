<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('Admin/dashboard');
});
Route::get('layout', function () {
    return view('Admin/layout');
});
Route::get('admin/category', [CategoriesController::class, 'index']);
Route::post('addCategory', [CategoriesController::class, 'insert']);



Route::get('admin/menu', [MenuController::class, 'index']);
Route::post('addMenu', [MenuController::class, 'insert']);
Route::get('menu', [MenuController::class, 'userData']);


Route::get('/', function () {
    return view('User.home');
});
Route::get('/', [MenuController::class, 'home']);
Route::get('/', [MenuController::class, 'home']);

Route::get('/contact', function () {
    return view('User/contact');
});