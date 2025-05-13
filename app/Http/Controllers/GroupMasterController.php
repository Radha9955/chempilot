<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupMaster;

class GroupMasterController extends Controller
{public function index()
{
    $groups = GroupMaster::paginate(10); // Show 10 records per page
    return view('groupmasters.index', compact('groups'));
}

    public function create()
    {
        return view('groupmasters.create');
    }

    public function store(Request $request)
    {
        GroupMaster::create($request->all());
        return redirect()->route('groupmasters.index')->with('success', 'Group created successfully.');
    }

    public function edit($id)
    {
        $group = GroupMaster::findOrFail($id);
        return view('groupmasters.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $group = GroupMaster::findOrFail($id);
        $group->update($request->all());
        return redirect()->route('groupmasters.index')->with('success', 'Group updated successfully.');
    }

    public function destroy($id)
    {
        GroupMaster::destroy($id);
        return redirect()->route('groupmasters.index')->with('success', 'Group deleted successfully.');
    }
}

