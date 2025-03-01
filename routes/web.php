<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->group(function(){
        Route::prefix('restaurants')->group(function(){
            Route::get('/', [RestaurantController::class, 'index'])->name('restaurant.index');
            Route::get('new', [RestaurantController::class, 'new'])->name('restaurant.new');
            Route::post('store', [RestaurantController::class, 'store'])->name('restaurant.store');
            Route::get('edit/{restaurant}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
            Route::put('update/{restaurant}', [RestaurantController::class, 'update'])->name('restaurant.update');
            Route::delete('destroy/{restaurant}', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');
        });
        Route::prefix('users')->group(function(){
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('new', [UserController::class, 'new'])->name('user.new');
            Route::post('store', [UserController::class, 'store'])->name('user.store');
            Route::get('edit/{user}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('update/{user}', [UserController::class, 'update'])->name('user.update');
            Route::delete('destroy{user}', [UserController::class, 'destroy'])->name('user.destroy');
        });
        Route::prefix('menus')->group(function(){
            Route::get('/', [MenuController::class, 'index'])->name('menu.index');
            Route::get('new', [MenuController::class, 'new'])->name('menu.new');
            Route::post('store', [MenuController::class, 'store'])->name('menu.store');
            Route::get('edit/{menu}', [MenuController::class, 'edit'])->name('menu.edit');
            Route::put('update/{menu}', [MenuController::class, 'update'])->name('menu.update');
            Route::delete('destroy/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
        });
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
