<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemMaster;
use App\Models\ProductMaster;

use Illuminate\Database\QueryException;


class ItemMasterController extends Controller
{
    // Display all items
    // public function index()
    // {
    //     $items = ItemMaster::all();
    //     return view('itemmaster.index', compact('items'));
    // }
    public function index()
{
    // Use paginate() instead of get()
    $items = ItemMaster::paginate(10); // Adjust 10 as per your requirement (items per page)

    return view('itemmaster.index', compact('items'));
}


    // Show form to create a new item
    public function create()
    {
       $products = ProductMaster::all();
        return view('itemmaster.create', compact('products'));
    }

    // Store new item
    public function store(Request $request)
    {
        ItemMaster::create($request->all());
        return redirect()->route('itemmaster.index')->with('success', 'Item created successfully.');
    }

    // Show form to edit an item
    public function edit($id)
    {
          $item = ItemMaster::findOrFail($id);
        // Fetch all products for the dropdown
        $products = ProductMaster::all();
        return view('itemmaster.edit', compact('item', 'products'));
    }

    // Update the item
    public function update(Request $request, $id)
    {
        $item = ItemMaster::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('itemmaster.index')->with('success', 'Item updated successfully.');
    }

    // Delete the item
    // public function destroy($id)
    // {
    //     ItemMaster::destroy($id);
    //     return redirect()->route('itemmaster.index')->with('success', 'Item deleted successfully.');
    // }
    public function destroy($id)
{
    try {
        ItemMaster::destroy($id);
        return redirect()->route('itemmaster.index')->with('success', 'Item deleted successfully.');
    } catch (QueryException $e) {
        return redirect()->route('itemmaster.index')
            ->with('error', 'Cannot delete this item. It is associated with other records.');
    }
    
}
public function show($id)
{
    $item = ItemMaster::findOrFail($id);
    return view('itemmaster.show', compact('item'));
}
}
