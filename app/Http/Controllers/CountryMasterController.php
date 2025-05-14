<?php

namespace App\Http\Controllers;

use App\Models\CountryMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class CountryMasterController extends Controller
{
    public function index()
    {
        $countries = CountryMaster::paginate(10);
        return view('countrymaster.index', compact('countries'));
    }

    public function create()
    {
        return view('countrymaster.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'CountryName' => 'required|string|max:255|unique:CountryMaster,CountryName',
            'IsActive' => 'nullable|boolean',
        ]);

        try {
            $input = [
                'CountryName' => $request->input('CountryName'),
                'IsActive' => $request->has('IsActive'),
                'CreatedDate' => Carbon::now(),
                'CreatedBy' => Auth::id() ?? 1, // fallback if not logged in
            ];

            CountryMaster::create($input);

            return redirect()->route('countrymaster.index')
                             ->with('success', 'Country created successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return back()->withErrors(['CountryName' => 'This country already exists.'])->withInput();
            }

            return back()->with('error', 'Database error: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $country = CountryMaster::findOrFail($id);
        return view('countrymaster.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'CountryName' => 'required|string|max:255|unique:CountryMaster,CountryName,' . $id . ',ID',
        ]);

        try {
            $country = CountryMaster::findOrFail($id);
            $country->update([
                'CountryName' => $request->input('CountryName'),
                'IsActive' => $request->has('IsActive'),
                'ModifiedDate' => Carbon::now(),
                'ModifiedBy' => Auth::id() ?? 1,
            ]);

            return redirect()->route('countrymaster.index')->with('success', 'Country updated successfully.');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return back()->withErrors(['CountryName' => 'This country already exists.'])->withInput();
            }

            return back()->with('error', 'Database error: ' . $e->getMessage());
        }
    }

   public function destroy($id)
{
    try {
        CountryMaster::destroy($id);
        return redirect()->route('countrymaster.index')->with('success', 'Country deleted successfully.');
    } catch (QueryException $e) {
        if ($e->getCode() == '23000') { // Foreign key constraint violation
            return redirect()->route('countrymaster.index')
                ->with('error', 'Cannot delete this country because it is associated with other records.');
        }

        return redirect()->route('countrymaster.index')
            ->with('error', 'An unexpected error occurred while deleting the country.');
    }
}

}
