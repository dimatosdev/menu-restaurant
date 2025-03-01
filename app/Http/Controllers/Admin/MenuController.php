<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
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
        $restaurants = Restaurant::all(['id', 'name']);
        return view('admin.menus.store', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $menuData = $request->all();

        $restaurant = Restaurant::find($menuData['restaurant_id']);
        $restaurant->menus()->create($menuData);


        return redirect()->route('menu.index')->with('success', 'Restaurante criado com sucesso!');
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
    public function edit(Menu $menu)
    {
        $restaurants = Restaurant::all(['id', 'name']);

        return view('admin.menus.edit', compact('menu', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $restaurantData = $request->all();
        $menu = Menu::find($menu->id);
        $menu->restaurant()->associate($restaurantData['restaurant_id']);
        $menu->update($restaurantData);


        return redirect()->route('menu.index')->with('success', 'Restaurante Editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Restaurante deletado com sucesso!');
    }

}
