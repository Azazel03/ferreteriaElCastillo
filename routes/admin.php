<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsInterfacesController;
use App\Http\Controllers\ThemesInterfacesController;

//Rutas Controlador News
Route::get('news',[NewsInterfacesController::class, 'index']);
Route::get('news/create',[NewsInterfacesController::class, 'create']);
Route::post('news/store',[NewsInterfacesController::class, 'store']);
Route::get('news/{id}',[NewsInterfacesController::class, 'show']);
Route::get('news/edit/{id}',[NewsInterfacesController::class, 'edit']);
Route::patch('news/update/{id}',[NewsInterfacesController::class, 'update']);

//Rutas Controlador Theme
Route::get('themes',[ThemesInterfacesController::class, 'index']);
Route::get('themes/create',[ThemesInterfacesController::class, 'create']);
Route::post('themes/store',[ThemesInterfacesController::class, 'store']);
Route::get('themes/edit/{id}',[ThemesInterfacesController::class, 'edit']);
Route::patch('themes/update/{id}',[ThemesInterfacesController::class, 'update']);

