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
Route::post('/updateCategory/{id}', [CategoriesController::class, 'update']);
Route::get('/deleteCategory/{id}', [CategoriesController::class, 'delete']);



Route::get('admin/menu', [MenuController::class, 'index']);
Route::post('addMenu', [MenuController::class, 'insert']);
Route::get('menu', [MenuController::class, 'userData']);
Route::post('updateMenu/{id}', [MenuController::class, 'update']);
Route::get('/deleteMenu/{id}', [MenuController::class, 'delete']);


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
