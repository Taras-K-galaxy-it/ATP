<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('car_brands.index', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_brands' => 'required|string|max:255',
        ]);

        Brand::create($request->all());

        return redirect()->route('brands.index')->with('success', 'Brand added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Create the specified resource in storage.
     */
    public function create()
    {
        return view('car_brands.create');
    }

    /**
     *  Editing of the specified resource in the repository.
    */

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('car_brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'car_brands' => 'required|string|max:255',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update($request->all());

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
    }
}
