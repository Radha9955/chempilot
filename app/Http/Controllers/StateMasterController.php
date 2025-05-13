<?php

namespace App\Http\Controllers;

use App\Models\StateMaster;
use App\Models\CountryMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class StateMasterController extends Controller
{
    public function index()
    {
        $states = StateMaster::with('country')->paginate(10);
        return view('statemaster.index', compact('states'));
    }

    public function create()
    {
        $countries = CountryMaster::where('IsActive', true)->get();
        return view('statemaster.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'StateName' => 'required|string|max:255|unique:StateMaster,StateName',
            'CountryID' => 'required|exists:CountryMaster,ID',
        ]);

        StateMaster::create([
            'StateName' => $request->StateName,
            'CountryID' => $request->CountryID,
            'IsActive' => $request->has('IsActive'),
            'GSTInit' => $request->GSTInit,
            'CreatedDate' => Carbon::now(),
            'CreatedBy' => Auth::id() ?? 1,
        ]);

        return redirect()->route('statemaster.index')->with('success', 'State created successfully.');
    }

    public function edit($id)
    {
        $state = StateMaster::findOrFail($id);
        $countries = CountryMaster::where('IsActive', true)->get();
        return view('statemaster.edit', compact('state', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'StateName' => 'required|string|max:255|unique:StateMaster,StateName,' . $id . ',ID',
            'CountryID' => 'required|exists:CountryMaster,ID',
        ]);

        $state = StateMaster::findOrFail($id);
        $state->update([
            'StateName' => $request->StateName,
            'CountryID' => $request->CountryID,
            'IsActive' => $request->has('IsActive'),
            'GSTInit' => $request->GSTInit,
            'ModifiedDate' => Carbon::now(),
            'ModifiedBy' => Auth::id() ?? 1,
        ]);

        return redirect()->route('statemaster.index')->with('success', 'State updated successfully.');
    }

    public function destroy($id)
    {
        StateMaster::destroy($id);
        return redirect()->route('statemaster.index')->with('success', 'State deleted.');
    }
}
