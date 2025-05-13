<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HSNMaster;
use App\Models\GSTMaster;

class HSNMasterController extends Controller
{
    // Show the list of HSN Master entries with pagination
    public function index()
    {
        $hsnMasters = HSNMaster::paginate(10); // Show 10 records per page
        return view('hsnmasters.index', compact('hsnMasters'));
    }

    // Show the form to create a new HSN Master entry
  public function create()
{
    // Assuming you have a GST model or table to fetch GST data
    $gstData = GSTMaster::all(); // Replace with actual data fetching logic
    return view('hsnmasters.create', compact('gstData'));
}

    // Store a new HSN Master entry in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'HSNName' => 'required|string|max:255',
            'GSTID' => 'nullable|integer',
            'IsActive' => 'nullable|boolean',
        ]);

        // Create a new HSN Master record
        HSNMaster::create($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('hsnmasters.index')->with('success', 'HSN Master created successfully.');
    }

    // Show the form to edit an existing HSN Master entry
 public function edit($id)
{
    $hsnMaster = HSNMaster::findOrFail($id); // Fetch the HSNMaster record by ID
    $gstData = GSTMaster::all(); // Fetch all GST records for dropdown

    return view('hsnmasters.edit', compact('hsnMaster', 'gstData')); // Pass both to the view
}


    // Update an existing HSN Master entry in the database
    public function update(Request $request, HSNMaster $hsnmaster) // Use model binding here
    {
        // Validate the incoming request
        $request->validate([
            'HSNName' => 'required|string|max:255',
            'GSTID' => 'nullable|integer',
            'IsActive' => 'nullable|boolean',
        ]);

        // Update the HSN entry with the new data
        $hsnmaster->update($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('hsnmasters.index')->with('success', 'HSN Master updated successfully.');
    }

    // Delete an existing HSN Master entry
    public function destroy(HSNMaster $hsnmaster) // Use model binding here
    {
        // Delete the HSN entry
        $hsnmaster->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('hsnmasters.index')->with('success', 'HSN Master deleted successfully.');
    }
}
