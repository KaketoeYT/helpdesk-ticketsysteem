<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = location::all();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:locations,name',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'street_number' => 'required',
        ]);

        Location::create([
            'name' => $validated['name'],
            'country' => $validated['country'],
            'city' => $validated['city'],
            'street' => $validated['street'],
            'street_number' => $validated['street_number'],
        ]);

        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(location $location)
    {
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, location $location)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:locations,name,' . $location->id,
        ]);

        $location->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(location $location)
    {
        $location->delete();
        return redirect()->route('locations.index');
    }
}
