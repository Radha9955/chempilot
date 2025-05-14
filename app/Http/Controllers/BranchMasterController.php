<?php

namespace App\Http\Controllers;

use App\Models\BranchMaster;
use App\Models\CityMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class BranchMasterController extends Controller
{
    public function index()
    {
        $branches = BranchMaster::with('city')->paginate(10);
        return view('branchmaster.index', compact('branches'));
    }

    public function create()
    {
        $cities = CityMaster::all();
        return view('branchmaster.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'BranchCode' => 'required|string|max:50|unique:BranchMaster,BranchCode',
            'BranchName' => 'required|string|max:255',
            'CityID' => 'required|integer',
        ]);

        $data = $request->all();
        $data['IsActive'] = $request->has('IsActive');
        $data['CreatedDate'] = Carbon::now();
        $data['CreatedBy'] = Auth::id();

        BranchMaster::create($data);

        return redirect()->route('branchmaster.index')->with('success', 'Branch created successfully.');
    }

    public function edit($id)
    {
        $branch = BranchMaster::findOrFail($id);
        $cities = CityMaster::all();
        return view('branchmaster.edit', compact('branch', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'BranchCode' => 'required|string|max:50',
            'BranchName' => 'required|string|max:255',
            'CityID' => 'required|integer',
        ]);

        $branch = BranchMaster::findOrFail($id);

        $data = $request->all();
        $data['IsActive'] = $request->has('IsActive');
        $data['ModifiedDate'] = Carbon::now();
        $data['ModifiedBy'] = Auth::id();

        $branch->update($data);

        return redirect()->route('branchmaster.index')->with('success', 'Branch updated.');
    }

  public function destroy($id)
{
    try {
        BranchMaster::destroy($id);
        return redirect()->route('branchmaster.index')->with('success', 'Branch deleted.');
    } catch (QueryException $e) {
        // Check for foreign key constraint error code (SQL Server/ MySQL)
        if ($e->getCode() == '23000') {
            return redirect()->route('branchmaster.index')->with('error', 'Cannot delete this branch because it is associated with other records.');
        }

        return redirect()->route('branchmaster.index')->with('error', 'An unexpected error occurred.');
    }
}
}
