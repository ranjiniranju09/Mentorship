<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\ResourceApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ResourceApprovalController extends Controller
{
    public function index()
    {
        // Fetch all resources with their associated module data
        $approvals = DB::table('resources')
        ->leftJoin('modules', 'resources.module_id', '=', 'modules.id')
        ->select('resources.*', 'modules.name as module_name')
        ->get();

        // Pass the resources to the view
        return view('resource_approvals.index', compact('approvals'));
    }

    public function approve(Request $request, $id)
    {

        $approval = DB::table('resources')
              ->where('id', $id)
              ->where('is_approved', false)
              ->first();
        
        
    if ($approval) {
        DB::table('resources')
        ->where('id', $id)
        ->update([
            'is_approved' => true,
            'admin_id' => Auth::id(),
        ]);
    }

       
        // // Update the associated Resource record to approved
        // $resource = Resource::findOrFail($id);
        // $resource->update(['is_approved' => true]);
    
        // // Redirect back to the index page with a success message
        return redirect()->route('resource_approvals.index')
                         ->with('success', 'Resource approved successfully');
    }
    
}
