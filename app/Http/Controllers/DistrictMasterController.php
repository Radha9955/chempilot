<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DistrictMaster;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DistrictMasterController extends Controller
{
    public function index()
    {
        $districts = DistrictMaster::paginate(10);
        return view('districtmaster.index', compact('districts'));
    }

    public function create()
    {
        return view('districtmaster.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'DistrictName' => 'required|string|max:255|unique:DistrictMaster,DistrictName',
            'StateID' => 'required|integer',
        ]);

        $input = $request->only(['DistrictName', 'StateID']);
        $input['IsActive'] = $request->has('IsActive');
        $input['CreatedDate'] = Carbon::now();
        $input['CreatedBy'] = Auth::id();

        DistrictMaster::create($input);

        return redirect()->route('districtmaster.index')->with('success', 'District created successfully.');
    }

    public function edit($id)
    {
        $district = DistrictMaster::findOrFail($id);
        return view('districtmaster.edit', compact('district'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'DistrictName' => 'required|string|max:255',
            'StateID' => 'required|integer',
        ]);

        $district = DistrictMaster::findOrFail($id);

        $district->update([
            'DistrictName' => $request->DistrictName,
            'StateID' => $request->StateID,
            'IsActive' => $request->has('IsActive'),
            'ModifiedDate' => Carbon::now(),
            'ModifiedBy' => Auth::id(),
        ]);

        return redirect()->route('districtmaster.index')->with('success', 'District updated.');
    }

    public function destroy($id)
    {
        DistrictMaster::destroy($id);
        return redirect()->route('districtmaster.index')->with('success', 'District deleted.');
    }
}
