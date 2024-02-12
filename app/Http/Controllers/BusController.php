<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Bus;
use App\Models\Driver;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::all();
        return view('buses.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drivers = Driver::all();
        $brands  = Brand::all();
        return view('buses.create', compact('drivers', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'license_plate' => 'required|string|max:8'
        ]);
        Bus::create($request->all());
        return redirect()->route('buses.index')->with('success', 'Bus added successfully');
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
    public function edit($id)
    {
        $bus = Bus::findOrFail($id);
        return view('buses.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'license_plate' => 'required|string|max:8'
        ]);

        $bus = Bus::findOrFail($id);
        $bus->update($request->all());

        return redirect()->route('buses.index')->with('success', 'Bus updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bus = Bus::findOrFail($id);
        $bus-> delete();
        return redirect()->route('buses.index')->with('success', 'Bus deleted successfully');
    }
}
