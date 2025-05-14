<?php

namespace App\Http\Controllers;

use App\Models\CompanyMaster;
use App\Models\CityMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CompanyMasterController extends Controller
{
   public function index()
{
    $companies = CompanyMaster::paginate(10); // ✅ Keep only this
    return view('companymasters.index', compact('companies'));
}


    public function create()
    {
        $cities = CityMaster::all();
        return view('companymasters.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'CompanyName' => 'required|string|max:255',
            'MobilePhone' => 'nullable|string|max:15',
            'TIN' => 'nullable|string|max:20',
            'GST' => 'nullable|string|max:20',
            'WhatsAppNo' => 'nullable|string|max:15',
            'CompanyCode' => 'required|string|max:50',
            'Email' => 'nullable|email|max:255',
            'AddressLine1' => 'nullable|string|max:255',
            'AddressLine2' => 'nullable|string|max:255',
            'AddressLine3' => 'nullable|string|max:255',
            'CityID' => 'required|exists:CityMaster,ID',
            'PinCode' => 'nullable|string|max:10',
            'Logo' => 'nullable|image|max:2048',
            'Website' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('Logo')) {
            $file = $request->file('Logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('logos'), $filename);
            $validated['Logo'] = $filename;
        }

        $validated['CreatedDate'] = now();
        // $validated['CreatedBy'] = auth()->id() ?? 1;

        CompanyMaster::create($validated);

        return redirect()->route('companymasters.index')->with('success', 'Company created successfully!');
    }

    public function edit($id)
    {
        $company = CompanyMaster::findOrFail($id);
        $cities = CityMaster::all();
        return view('companymasters.edit', compact('company', 'cities'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'CompanyName' => 'required|string|max:255',
                'MobilePhone' => 'nullable|string|max:15',
                'TIN' => 'nullable|string|max:20',
                'GST' => 'nullable|string|max:20',
                'Phone' => 'nullable|string|max:64',
                'WhatsAppNo' => 'nullable|string|max:15',
                'CompanyCode' => 'nullable|string|max:50',
                'Email' => 'nullable|email|max:255',
                'AddressLine1' => 'required|string|max:255',
                'AddressLine2' => 'nullable|string|max:255',
                'AddressLine3' => 'nullable|string|max:255',
                'CityID' => 'required|exists:CityMaster,ID',
                'PinCode' => 'nullable|string|max:10',
                'Logo' => 'nullable|image|max:2048',
                'Website' => 'nullable|string|max:255',
            ]);

            if ($request->hasFile('Logo')) {
                $file = $request->file('Logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('logos'), $filename);
                $validated['Logo'] = $filename;
            }

            $validated['ModifiedDate'] = now();
            // $validated['ModifiedBy'] = auth()->id() ?? 1;
            $validated['IsActive'] = $request->has('IsActive') ? 1 : 0;

            $company = CompanyMaster::findOrFail($id);
            $company->update($validated);

            return redirect()->route('companymasters.index')->with('success', 'Company updated successfully.');
        } catch (\Exception $e) {
            // \Log::error('Company update error', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Error updating company. Please try again.')->withInput();
        }
    }

    public function destroy($id)
    {
        $company = CompanyMaster::findOrFail($id);
        $company->delete();

        return redirect()->route('companymasters.index')->with('success', 'Company deleted successfully.');
    }
}
