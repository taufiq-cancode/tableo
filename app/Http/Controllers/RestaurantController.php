<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    public function showTables(Restaurant $restaurant)
    {
        $tables = $restaurant->tables;
        return view('restaurants.tables', compact('restaurant', 'tables'));
    }

    public function showActiveTables(Restaurant $restaurant)
    {
        $activeTables = $restaurant->tables()
                        ->where('active', true)
                        ->with('diningArea')
                        ->get()
                        ->groupBy('diningArea.name');
                        
        return view('restaurants.active_tables', compact('restaurant', 'activeTables'));
    }
}
