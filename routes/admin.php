<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProductsController;

//Rutas Controlador Info
Route::get('welcome',[InfoController::class, 'index'])->middleware('auth');

//Rutas Controlador Products
Route::get('products',[ProductsController::class, 'index'])->middleware('auth');
Route::get('products/create',[ProductsController::class, 'create'])->middleware('auth');
Route::post('products/store',[ProductsController::class, 'store'])->middleware('auth');
Route::get('products/{id}',[ProductsController::class, 'show'])->middleware('auth');
Route::get('products/edit/{id}',[ProductsController::class, 'edit'])->middleware('auth');
Route::patch('products/update/{id}',[ProductsController::class, 'update'])->middleware('auth');
