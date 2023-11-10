<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TipController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home') ->name('admin.home');

Route::resource('users', UserController::class)->except('show')->names('admin.users');


Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');

Route::resource('products', ProductController:: class)->except('show')->names('admin.products');

Route::resource('tips', TipController::class)->except('show')->names('admin.tips');