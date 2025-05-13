<?php

namespace App\Http\Controllers;

use App\Models\GSTMaster;
use Illuminate\Http\Request;

class GSTMasterController extends Controller
{
    public function index()
    {
        $gstMasters = GstMaster::paginate(10); // Adjust the number of items per page as needed
        return view('gstmasters.index', compact('gstMasters'));
    }

    public function create()
    {
        return view('gstmasters.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'GSTName' => 'required|string|max:255',
            'GroupID' => 'nullable|integer',
            'FromAmount' => 'nullable|numeric',
            'ToAmount' => 'nullable|numeric',
            'FromDate' => 'nullable|date',
            'ToDate' => 'nullable|date',
            'TaxID' => 'nullable|integer',
            'IsActive' => 'nullable|boolean',
            'CreatedDate' => 'nullable|date',
            'CreatedBy' => 'nullable|integer',
            'ModifiedDate' => 'nullable|date',
            'ModifiedBy' => 'nullable|integer',
        ]);

        GSTMaster::create($validatedData);
        return redirect()->route('gstmasters.index')->with('success', 'GST Master created successfully');
    }

    public function edit($id)
    {
        $gstMaster = GSTMaster::findOrFail($id);
        return view('gstmasters.edit', compact('gstMaster'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'GSTName' => 'required|string|max:255',
            'GroupID' => 'nullable|integer',
            'FromAmount' => 'nullable|numeric',
            'ToAmount' => 'nullable|numeric',
            'FromDate' => 'nullable|date',
            'ToDate' => 'nullable|date',
            'TaxID' => 'nullable|integer',
            'IsActive' => 'nullable|boolean',
            'CreatedDate' => 'nullable|date',
            'CreatedBy' => 'nullable|integer',
            'ModifiedDate' => 'nullable|date',
            'ModifiedBy' => 'nullable|integer',
        ]);

        $gstMaster = GSTMaster::findOrFail($id);
        $gstMaster->update($validatedData);

        return redirect()->route('gstmasters.index')->with('success', 'GST Master updated successfully');
    }

    public function destroy($id)
    {
        $gstMaster = GSTMaster::findOrFail($id);
        $gstMaster->delete();
        return redirect()->route('gstmasters.index')->with('success', 'GST Master deleted successfully');
    }
}
