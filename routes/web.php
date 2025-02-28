<?php

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
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
