<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubGroupMaster;
use App\Models\GroupMaster;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class SubGroupMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subGroups = SubGroupMaster::paginate(10); // Show 10 records per page
        return view('subgroupmaster.index', compact('subGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch the groups from the database (adjust the model and logic as necessary)
        $groups = GroupMaster::all();  // Fetch all groups, or adjust as needed

        // Pass the groups to the view
        return view('subgroupmaster.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'SubGroupName' => 'required',
            'GroupID' => 'required|exists:GroupMaster,ID',  // Validate that the GroupID exists in GroupMaster table
            'DiscountPct' => 'nullable|numeric',
            'TaxPct' => 'nullable|numeric',
            'IsActive' => 'nullable|boolean',
        ]);

        // Insert into SubGroupMaster
        $subGroup = new SubGroupMaster;
        $subGroup->SubGroupName = $request->input('SubGroupName');
        $subGroup->GroupID = $request->input('GroupID');
        $subGroup->DiscountPct = $request->input('DiscountPct');
        $subGroup->TaxPct = $request->input('TaxPct');
        $subGroup->IsActive = $request->has('IsActive') ? 1 : 0;
        $subGroup->CreatedDate = now();
        $subGroup->CreatedBy = Auth::check() ? Auth::id() : 1;  // Use fallback value if auth is not configured
        $subGroup->save();

        return redirect()->route('subgroupmaster.index')->with('success', 'SubGroup created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subGroup = SubGroupMaster::findOrFail($id);
        return view('subgroupmaster.show', compact('subGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $subGroup = SubGroupMaster::findOrFail($id);
    //     return view('subgroupmaster.edit', compact('subGroup'));
    // }
    public function edit($id)
{
    $subGroup = SubGroupMaster::findOrFail($id);
    $groups = GroupMaster::all(); // To populate the dropdown

    return view('subgroupmaster.edit', compact('subGroup', 'groups'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'SubGroupName' => 'required|string|max:255',
            'GroupID' => 'nullable|integer',
            'DiscountPct' => 'nullable|numeric|between:0,99999999.99',
            'TaxPct' => 'nullable|numeric|between:0,99999999.99',
            'IsActive' => 'nullable|boolean',
        ]);

        $subGroup = SubGroupMaster::findOrFail($id);

        $subGroup->update([
            'SubGroupName' => $request->SubGroupName,
            'GroupID' => $request->GroupID,
            'DiscountPct' => $request->DiscountPct,
            'TaxPct' => $request->TaxPct,
            'IsActive' => $request->boolean('IsActive'),
            'ModifiedDate' => now(),
            'ModifiedBy' => Auth::check() ? Auth::id() : 1, // Use fallback value if auth is not configured
        ]);

        return redirect()->route('subgroupmaster.index')->with('success', 'Sub Group updated successfully.');
    }

    public function destroy(SubGroupMaster $subgroupmaster)
    {
        $subgroupmaster->delete();
        return redirect()->route('subgroupmaster.index')->with('success', 'SubGroup deleted successfully.');
    }
}
