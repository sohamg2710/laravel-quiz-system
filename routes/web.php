<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Route::get('/', function () {
    return view('welcome');
});

 Route::view('/admin-login', 'admin-login');

 Route::post('/admin-login',[AdminController::class,'login']);
 Route::get('/dashboard',[AdminController::class,'dashboard']);
 Route::get('/admin-categories',[AdminController::class,'categories']);
 Route::get('/admin-logout',[AdminController::class,'logout']);