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
            'car_brands' => 'required|max:25',
        ]);
        $brand = Brand::create($request->all());
        return redirect('car_brands.index')->with('success', 'Model added successfully');
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
        return view('car_brands.edit', compact('brand'));    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Додайте інші правила валідації за необхідністю
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update($request->all());

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
    }
}
