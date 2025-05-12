<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubGroupMaster;
use Illuminate\Support\Facades\Log;

class SubGroupMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subGroups = SubGroupMaster::all();
        return view('subgroupmaster.index', compact('subGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subgroupmaster.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'SubGroupName' => 'required|string|max:255',
            'GroupID' => 'nullable|integer',
            'DiscountPct' => 'nullable|numeric',
            'TaxPct' => 'nullable|numeric',
            'IsActive' => 'nullable|boolean',
        ]);

        SubGroupMaster::create([
            'SubGroupName' => $request->SubGroupName,
            'GroupID' => $request->GroupID,
            'DiscountPct' => $request->DiscountPct,
            'TaxPct' => $request->TaxPct,
            'IsActive' => $request->has('IsActive') ? 1 : 0,
            'CreatedDate' => now(),
            'CreatedBy' => auth()->id(), // optional: if auth not used, hardcode 1
        ]);

        return redirect()->route('subgroupmaster.index')->with('success', 'SubGroup created.');
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
    public function edit(string $id)
    {
        $subGroup = SubGroupMaster::findOrFail($id);
        return view('subgroupmaster.edit', compact('subGroup'));
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
        'ModifiedBy' => auth()->id() ?? 1, // Default to 1 if no auth
    ]);

    return redirect()->route('subgroupmaster.index')->with('success', 'Sub Group updated successfully.');
}


    public function destroy(SubGroupMaster $subgroupmaster)
    {
        $subgroupmaster->delete();
        return redirect()->route('subgroupmaster.index')->with('success', 'SubGroup deleted successfully.');
    }
}
