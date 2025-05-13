<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisplayMaster;
use App\Models\ItemMaster;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DisplayMasterController extends Controller
{
    // Display all entries with pagination
    public function index()
    {
        $displays = DisplayMaster::paginate(10); // Adjust pagination limit as needed
        return view('displaymaster.index', compact('displays'));
    }

    // Show the form to create a new record
    public function create()
    {
     $items = ItemMaster::all(); // Fetch items for dropdown
    return view('displaymaster.create', compact('items'));
    }

    // Store a new record
    public function store(Request $request)
    {
        $request->validate([
            'DisplayName' => 'required|string|max:255',
            'ItemID' => 'required|integer',
            'BranchID' => 'required|integer',
        ]);

        $input = $request->all();
        $input['IsActive'] = $request->has('IsActive');
        $input['CreatedDate'] = Carbon::now();
        $input['CreatedBy'] = Auth::id();

        DisplayMaster::create($input);

        return redirect()->route('displaymaster.index')->with('success', 'Display record created successfully.');
    }

    // Show the form to edit a record
    public function edit($id)
    {
        $display = DisplayMaster::findOrFail($id);
    $items = ItemMaster::all(); // Fetch items for dropdown
    return view('displaymaster.edit', compact('display', 'items'));
    }

    // Update a record
    public function update(Request $request, $id)
    {
        $request->validate([
            'DisplayName' => 'required|string|max:255',
            'ItemID' => 'required|integer',
            'BranchID' => 'required|integer',
        ]);

        $display = DisplayMaster::findOrFail($id);

        $input = $request->all();
        $input['IsActive'] = $request->has('IsActive');
        $input['ModifiedDate'] = Carbon::now();
        $input['ModifiedBy'] = Auth::id();

        $display->update($input);

        return redirect()->route('displaymaster.index')->with('success', 'Display record updated successfully.');
    }

    // Delete a record with exception handling
    public function destroy($id)
    {
        try {
            DisplayMaster::destroy($id);
            return redirect()->route('displaymaster.index')->with('success', 'Display record deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->route('displaymaster.index')->with('error', 'Cannot delete this record. It is associated with other data.');
        }
    }

    // Show details of a specific record
    public function show($id)
    {
        $display = DisplayMaster::findOrFail($id);
        return view('displaymaster.show', compact('display'));
    }
}
