<?php

namespace App\Http\Controllers;

use App\Models\DiningArea;
use App\Models\Restaurant;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        $tables = $restaurant->tables;
        return view('tables.index', compact('restaurant', 'tables'));
    }

    public function active(Restaurant $restaurant)
    {
        $activeTables = $restaurant->tables()->where('active', true)->get()->groupBy('dining_area_id');
        return view('tables.active', compact('restaurant', 'activeTables'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        return view('tables.create', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tables,name',
            'minimum_capacity' => 'required|integer|min:1',
            'maximum_capacity' => 'required|integer|min:1',
            'active' => 'required|boolean',
            'restaurant_id' => 'required|exists:restaurants,id',
            'dining_area' => 'required|string|max:255',
        ]);

        $diningArea = DiningArea::firstOrCreate(['name' => $request->dining_area]);

        Table::create([
            'name' => $request->name,
            'minimum_capacity' => $request->minimum_capacity,
            'maximum_capacity' => $request->maximum_capacity,
            'active' => $request->active,
            'restaurant_id' => $request->restaurant_id,
            'dining_area_id' => $diningArea->id,
        ]);

        return redirect()->route('tables.create')->with('success', 'Table created successfully');
    }

    public function getDiningAreas(Request $request)
    {
        $query = $request->input('query');
        $diningAreas = DiningArea::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($diningAreas);
    }
}
