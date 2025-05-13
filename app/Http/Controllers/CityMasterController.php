<?php

namespace App\Http\Controllers;

use App\Models\CityMaster;
use App\Models\DistrictMaster; // Import DistrictMaster model
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\StateMaster;

class CityMasterController extends Controller
{
    public function index()
    {
        $cities = CityMaster::paginate(10);
        return view('citymaster.index', compact('cities'));
    }

  public function create()
{
    $states = StateMaster::all();  // Get all states for dropdown
    return view('citymaster.create', compact('states'));
}

    public function store(Request $request)
    {
        $request->validate([
            'CityName' => 'required|string|max:255|unique:CityMaster,CityName',
            'DistrictID' => 'required|integer',
        ]);

        $input = $request->only(['CityName', 'DistrictID']);
        $input['IsActive'] = $request->has('IsActive');
        $input['CreatedDate'] = Carbon::now();
        $input['CreatedBy'] = Auth::id();

        CityMaster::create($input);

        return redirect()->route('citymaster.index')->with('success', 'City created successfully.');
    }

 public function edit($id)
{
    $city = CityMaster::findOrFail($id);
    $states = StateMaster::all();  // Get all states for dropdown
    
    // Check if the city has a valid DistrictID
    if ($city->DistrictID) {
        $districts = DistrictMaster::where('StateID', $city->district->StateID)->get();
    } else {
        // Handle the case where no district is associated (e.g., show empty dropdown)
        $districts = [];
    }

    return view('citymaster.edit', compact('city', 'states', 'districts'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'CityName' => 'required|string|max:255',
            'DistrictID' => 'required|integer',
        ]);

        $city = CityMaster::findOrFail($id);

        $city->update([
            'CityName' => $request->CityName,
            'DistrictID' => $request->DistrictID,
            'IsActive' => $request->has('IsActive'),
            'ModifiedDate' => Carbon::now(),
            'ModifiedBy' => Auth::id(),
        ]);

        return redirect()->route('citymaster.index')->with('success', 'City updated.');
    }

    public function destroy($id)
    {
        CityMaster::destroy($id);
        return redirect()->route('citymaster.index')->with('success', 'City deleted.');
    }

    // Fetch districts based on selected state using AJAX
  public function getDistricts($stateID)
{
    $districts = DistrictMaster::where('StateID', $stateID)->get();
    return response()->json($districts);
}

}
