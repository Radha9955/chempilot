<?php

namespace App\Http\Controllers;

use App\Models\TaxMaster;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaxMasterController extends Controller
{
    public function index()
    {
        $taxes = TaxMaster::all();
        return view('taxmasters.index', compact('taxes'));
    }

    public function create()
    {
        return view('taxmasters.create');
    }

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
        $data['CreatedBy'] = auth()->id() ?? 1;
        $data['IsActive'] = $request->has('IsActive') ? 1 : 0;

        TaxMaster::create($data);

        return redirect()->route('taxmasters.index')->with('success', 'Tax Master created successfully.');
    }

    public function edit($id)
    {
        $tax = TaxMaster::find($id);

        if (!$tax) {
            return redirect()->route('taxmasters.index')->with('error', 'Tax record not found.');
        }

        return view('taxmasters.edit', compact('tax'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'TaxName' => 'required|string|max:255',
            'IGST'    => 'nullable|numeric',
            'CESS'    => 'nullable|numeric',
            'IsActive' => 'nullable|boolean',
        ]);

        $igst = $request->input('IGST', 0);
        $data['CGST'] = $igst / 2;
        $data['SGST'] = $igst / 2;
        $data['ModifiedDate'] = now();
        $data['ModifiedBy'] = auth()->id() ?? 1;

        $tax = TaxMaster::findOrFail($id);
        $tax->update($data);

        return redirect()->route('taxmasters.index')->with('success', 'Tax Master updated successfully.');
    }

    public function destroy(TaxMaster $taxmaster)
    {
        $taxmaster->delete();
        return redirect()->route('taxmasters.index')->with('success', 'Tax Master deleted.');
    }
}
