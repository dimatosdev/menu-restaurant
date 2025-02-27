<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    public function new()
    {
        return view('admin.restaurants.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $restaurantData = $request->all();

        $restaurant = new Restaurant();
        $restaurant->create($restaurantData);

        return redirect()->route('restaurant.index')->with('success', 'Restaurante criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurantData = $request->all();
        $restaurant->update($restaurantData);

        return redirect()->route('restaurant.index')->with('success', 'Restaurante Editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('restaurant.index')->with('success', 'Restaurante deletado com sucesso!');
    }

}
