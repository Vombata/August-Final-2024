<?php

namespace App\Http\Controllers;
use App\Models\Continent;
use App\Models\Country;
use App\Models\City;
use App\Models\Location;
use App\Models\Earthquake;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $earthquakes = Earthquake::all()->toArray();

        return view('home', ['allEarthquakes' => $earthquakes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $continents = Continent::all()->toArray();
        $countries = Country::all()->toArray();
        $cities = City::all()->toArray();
        $locations = Location::all()->toArray();

        return view('CreateEarthquake', ['continents' => $continents, 'countries' => $countries, 'cities' => $cities, 'locations' => $locations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'magnitude' => 'required|numeric|min:0',
            'name' => 'required|string',
            'date' => 'required|string',
            'continent' => 'required|numeric',
            'country' => 'required|numeric',
            'city' => 'required|numeric',
            'location' => 'required|string|max:255',
        ]);

        Earthquake::create([
            'magnitude' => $validatedData["magnitude"],
            'title' => $validatedData["name"],
            'earthquake_data' => $validatedData["date"],
            'continent_id' => $validatedData["continent"],
            'country_id' => $validatedData["country"],
            'city_id' => $validatedData["city"],
            'location_id' => $validatedData["location"],
        ]);

        return redirect()->route('earthquakes.index');
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
    public function edit(string $id): View
    {
        $earthquake = Earthquake::find($id);

        $continents = Continent::all()->toArray();
        $countries = Country::all()->toArray();
        $cities = City::all()->toArray();
        $locations = Location::all()->toArray();

        return view('edit', compact('earthquake', 'continents', 'countries', 'cities', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $earthquake = Earthquake::find($id);
        $earthquake->magnitude = $request->magnitude;
        $earthquake->title = $request->name;
        $earthquake->earthquake_data = $request->date;
        $earthquake->continent_id = $request->continent;
        $earthquake->country_id = $request->country;
        $earthquake->city_id = $request->city;
        $earthquake->location_id = $request->location;
        $earthquake->save();

        return redirect()->route('earthquakes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Earthquake::findOrfail($id)->delete();
        return redirect()->route('earthquakes.index');
    }
}
