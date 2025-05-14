<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\ProductMaster; 
use App\Models\SubGroupMaster; // Adding SubGroup model
use Illuminate\Http\Request; 
use App\Models\GroupMaster;
use Illuminate\Database\QueryException; // For handling query exceptions
 
class ProductMasterController extends Controller 
{ 
    public function index() 
{
    $products = ProductMaster::with('subgroup')->get(); 
    return view('productmaster.index', compact('products')); 
}
 
    // public function create() 
    // { 
    //     // Get all subgroups for dropdown
    //     $subgroups = SubGroupMaster::all();
    //     return view('productmaster.create', compact('subgroups'));
    // } 
    public function create()
{
    $subgroups = SubGroupMaster::all(); // or whatever logic you use
    $groups = GroupMaster::all();       // <-- make sure this is added

    return view('productmaster.create', compact('subgroups', 'groups'));
}
 
    public function store(Request $request) 
    { 
        ProductMaster::create($request->all()); 
        return redirect()->route('productmaster.index'); 
    } 
 
    public function show($id) 
    { 
        $product = ProductMaster::findOrFail($id); 
        return view('productmaster.show', compact('product')); 
    } 
 
   public function edit($id)
{
    $product = ProductMaster::findOrFail($id);

    // Fetch all subgroups and groups for dropdowns
    $subgroups = SubGroupMaster::all();
    $groups = GroupMaster::all();

    // Optionally load related subgroup and group for default selection in view
    $product->load('subgroup.group');

    return view('productmaster.edit', compact('product', 'subgroups', 'groups'));
}

 
    // public function update(Request $request, $id) 
    // { 
    //     $product = ProductMaster::findOrFail($id); 
    //     $product->update($request->all()); 
    //     return redirect()->route('productmaster.index'); 
    // } 
    public function update(Request $request, $id)
{
    $product = ProductMaster::findOrFail($id);

    $data = $request->all();

    // Convert HTML datetime-local to SQL-compatible format
    if (isset($data['ModifiedDate'])) {
        $data['ModifiedDate'] = \Carbon\Carbon::parse($data['ModifiedDate'])->format('Y-m-d H:i:s');
    }

    $product->update($data);

    return redirect()->route('productmaster.index')->with('success', 'Product updated successfully.');
}

 
  public function destroy($id)
{
    try {
        $product = ProductMaster::findOrFail($id);
        $product->delete();

        return redirect()->route('productmaster.index')
            ->with('success', 'Product deleted successfully.');
    } catch (QueryException $e) {
        if ($e->getCode() == '23000') {
            // Foreign key constraint violation
            return redirect()->route('productmaster.index')
                ->with('error', 'This product is associated with other records and cannot be deleted.');
        }

        // Optional: log other query exceptions
        return redirect()->route('productmaster.index')
            ->with('error', 'An error occurred while deleting the product.');
    }
}


public function getGroupBySubgroup(Request $request)
{
    // Fetch the SubGroupMaster by ID and get the associated Group
    $subgroup = SubGroupMaster::with('group')->find($request->subgroup_id);

    if ($subgroup && $subgroup->group) {
        return response()->json([
            'group_name' => $subgroup->group->GroupName // Fetch GroupName from the related GroupMaster
        ]);
    }

    return response()->json([
        'group_name' => 'N/A' // Return a default value if no group is found
    ]);
}
}