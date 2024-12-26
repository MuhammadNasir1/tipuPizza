<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin/dashboard');
});
Route::get('layout', function () {
    return view('Admin/layout');
});
Route::get('category', function () {
    return view('Admin/category');
});
Route::get('menu', function () {
    return view('Admin/menu');
});
