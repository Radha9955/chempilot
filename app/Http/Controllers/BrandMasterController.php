<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandMaster;

class BrandMasterController extends Controller
{
public function index()
{
    $brands = BrandMaster::paginate(10); // 10 items per page
    return view('brandmasters.index', compact('brands'));
}


    public function create()
    {
        return view('brandmasters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'BrandName' => 'required|string|max:255',
            'BrandDesc' => 'required|string|max:255',
        ]);

        BrandMaster::create([
            'BrandName' => $request->BrandName,
            'BrandDesc' => $request->BrandDesc,
            'IsActive' => 1,
            'CreatedDate' => now(),
            'CreatedBy' => 1 // update as needed
        ]);

        return redirect()->route('brandmasters.index')->with('success', 'Brand created successfully.');
    }

    public function edit($id)
    {
        $brand = BrandMaster::findOrFail($id);
        return view('brandmasters.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'BrandName' => 'required|string|max:255',
            'BrandDesc' => 'required|string|max:255',
        ]);

        $brand = BrandMaster::findOrFail($id);
        $brand->update([
            'BrandName' => $request->BrandName,
            'BrandDesc' => $request->BrandDesc,
            'ModifiedDate' => now(),
            'ModifiedBy' => 1 // update as needed
        ]);

        return redirect()->route('brandmasters.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy($id)
    {
        $brand = BrandMaster::findOrFail($id);
        $brand->delete();

        return redirect()->route('brandmasters.index')->with('success', 'Brand deleted successfully.');
    }
}
