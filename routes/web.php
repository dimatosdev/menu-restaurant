<?php

use App\Http\Controllers\Admin\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function(){
    Route::get('restaurants', [RestaurantController::class, 'index'])->name('restaurant.index');
    Route::get('restaurants/new', [RestaurantController::class, 'new'])->name('restaurant.new');
    Route::post('restaurants/store', [RestaurantController::class, 'store'])->name('restaurant.store');
    Route::get('restaurants/edit/{restaurant}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::put('restaurants/update/{restaurant}', [RestaurantController::class, 'update'])->name('restaurant.update');
    Route::delete('restaurants/destroy/{restaurant}', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');
});
