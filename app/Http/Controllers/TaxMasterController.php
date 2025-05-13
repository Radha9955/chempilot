<?php

namespace App\Http\Controllers;

use App\Models\TaxMaster;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TaxMasterController extends Controller
{
    /**
     * Display a listing of all tax masters.
     */
    public function index()
    {
        $taxes = TaxMaster::all();
        return view('taxmasters.index', compact('taxes'));
    }

    /**
     * Show the form for creating a new tax master.
     */
    public function create()
    {
        return view('taxmasters.create');
    }

    /**
     * Store a newly created tax master in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'TaxName' => 'required|string|max:255',
            'IGST'    => 'nullable|numeric',
            'CESS'    => 'nullable|numeric',
            'IsActive' => 'nullable|boolean',
        ]);

        // Calculate CGST and SGST based on IGST
        $igst = $request->input('IGST', 0);
        $data['CGST'] = $igst / 2;
        $data['SGST'] = $igst / 2;

        $data['CreatedDate'] = Carbon::now();
        // $data['CreatedBy'] = auth()->id() ?? 1;
        $data['IsActive'] = $request->has('IsActive') ? 1 : 0;

        TaxMaster::create($data);

        return redirect()->route('taxmasters.index')->with('success', 'Tax Master created successfully.');
    }

    /**
     * Show the form for editing the specified tax master.
     */
    public function edit(TaxMaster $taxmaster)
    {
        return view('taxmasters.edit', ['tax' => $taxmaster]);
    }

    /**
     * Update the specified tax master in storage.
     */
    public function update(Request $request, TaxMaster $taxmaster)
    {
        $data = $request->validate([
            'TaxName' => 'required|string|max:255',
            'IGST'    => 'nullable|numeric',
            'CESS'    => 'nullable|numeric',
            'IsActive' => 'nullable|boolean',
        ]);

        // Get values from request
        $taxName = $data['TaxName'];
        $igst = $request->input('IGST', 0);
        $cgst = $igst / 2;
        $sgst = $igst / 2;
        $cess = $request->input('CESS', 0);
        $isActive = $request->has('IsActive') ? 1 : 0;
        $modifiedDate = Carbon::now();
        // $modifiedBy = auth()->id() ?? 1;
        
        // Update using the model with correct ID
        $taxmaster->TaxName = $taxName;
        $taxmaster->IGST = $igst;
        $taxmaster->CGST = $cgst;
        $taxmaster->SGST = $sgst;
        $taxmaster->CESS = $cess;
        $taxmaster->IsActive = $isActive;
        $taxmaster->ModifiedDate = $modifiedDate;
        // $taxmaster->ModifiedBy = $modifiedBy;
        
        $taxmaster->save();

        return redirect()->route('taxmasters.index')->with('success', 'Tax Master updated successfully.');
    }

    /**
     * Remove the specified tax master from storage.
     */
    public function destroy(TaxMaster $taxmaster)
    {
        $taxmaster->delete();
        return redirect()->route('taxmasters.index')->with('success', 'Tax Master deleted.');
    }
}