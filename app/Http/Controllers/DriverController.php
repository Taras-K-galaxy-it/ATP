<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            //todo photo
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthdate' => [
                'nullable',
                'date',
                Rule::before(now()->subYears(65)),],
        ]);
        Driver::create($request->all());
        return redirect()->route('drivers.index')->with('success', 'Driver added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     *  Editing of the specified resource in the repository.
     */
    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            //TODO photo
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthdate' => [
                'nullable',
                'date',
                Rule::before(now()->subYears(65)),],
        ]);
        return redirect()->route('brands.index')->with('success', 'Driver updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driver = Driver::findOrFail($id);
        $driver-> delete();
        return redirect()->route('drivers.index')-with('success', 'Driver deleted successfully');
    }
}
