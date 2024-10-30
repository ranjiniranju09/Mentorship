<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\ModuleCompletedNotification;
use App\Mail\AdminModuleCompletedNotification;
use Illuminate\Support\Facades\Mail;
use App\Mentor;
use App\AssignTask;
use App\Module;
use App\Session;
use App\Chapter;
use App\Mapping;
class ModuleController extends Controller
{
  public function menteemoduleprogress()
  {

  	$mentorEmail = auth()->user()->email;

    $mentor = DB::table('mentors')->where('email', $mentorEmail)->first();
    $mentorId=$mentor->id;
    
  	//$modules=Module::all();
    $modules = DB::table('modules')->get();
    $progressData = [];
    foreach ($modules as $module) {
        $totalChapters = DB::table('chapters')->where('module_id', $module->id)->count();

        $completedChapters = DB::table('module_completion_tracker')
            ->where('mentee_id', $mentorId)
            ->where('module_id', $module->id)
            ->count();

        $completionPercentage = ($totalChapters > 0) ? ($completedChapters / $totalChapters) * 100 : 0;

        $progressData[] = [
            'module_name' => $module->name,
            'completion_percentage' => round($completionPercentage, 2)
        ];
    }
  	//$chapters=Chapter::all();
  	
  	//$sessions=Session::all();
  	//$sessions = Session::all()->groupBy('module_id');
  	$sessions = [];
    foreach ($modules as $module) {
        
        $session = DB::table('sessions')
            ->where('modulename_id', $module->id)
            ->where('menteename_id', $mentorId)
            ->get();


        if ($session->isNotEmpty()) {
            $sessions[$module->id] = $session;
        } else {
            $sessions[$module->id] = [];
        }

    }
  	return view('mentor.modules.menteemoduleprogress',compact('modules','sessions','progressData'));



  }
  /*
  	public function getChaptersByModule(Request $request)
	{
    	$moduleId = $request->module_id;
		dd($moduleId);

    	$chapters = Chapter::where('module_id', $moduleId)->get();

    	return response()->json(['chapters' => $chapters]);
	}
	*/
	public function showChapterCompletionPage($moduleId)
	{
        //$mentorId=Mentor::where('email',Auth::email)->pluck(id);
        $mentorId = Mentor::where('email', Auth::user()->email)->pluck('id')->first();

        $mentee_id=Mapping::where('mentorname_id',$mentorId)->pluck('menteename_id')->first();


		$chapters = Chapter::where('module_id', $moduleId)->get();

        $completedChapters = DB::table('module_completion_tracker')
        ->where('mentee_id', $mentee_id)
        ->where('module_id', $moduleId)
        ->pluck('chapter_id')
        ->toArray();



		return view('mentor.modules.markChapterCompletion',compact('moduleId','chapters','mentee_id','completedChapters'));
	}
    public function markChapterCompleted(Request $request,$mentee_id)
    {
        // DB::table('module_completion_tracker')->insert([
        //     'mentee_id' => $request->mentee_id,
        //     'module_id' => $request->module_id,
        //     'chapter_id' => $request->chapter_id,
        //     'completed_at' => now(),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        $moduleCounts = DB::table('chapters')
            ->select('module_id', DB::raw('COUNT(*) as total_chapters'))
            ->groupBy('module_id')
            ->get();

        // Step 4: Get completed chapters per module for the mapped mentee
        $completionStatus = DB::table('module_completion_tracker')
            ->select('module_id', DB::raw('COUNT(DISTINCT chapter_id) as completed_chapters'))
            ->where('mentee_id', $mentee_id)
            ->groupBy('module_id')
            ->get();

        // Step 5: Merge and check if all chapters are completed for the mapped mentee
        $completionCheck = [];

        foreach ($moduleCounts as $module) {
            // Find the completed chapters for the current module
            $status = $completionStatus->firstWhere('module_id', $module->module_id);
            $completedChapters = $status ? $status->completed_chapters : 0;
            $isCompleted = $module->total_chapters == $completedChapters;

            $completionCheck[] = [
                'mentee_id' => $mentee_id,
                'module_id' => $module->module_id,
                'total_chapters' => $module->total_chapters,
                'completed_chapters' => $completedChapters,
                'is_completed' => $isCompleted ? 'Yes' : 'No'
            ];
         // Fetch mentor, mentee, and module details
        $mentor = DB::table('mentors')->where('email', auth()->user()->email)->first();
        $mentee = DB::table('mentees')->where('id', $request->mentee_id)->first();
        $module = DB::table('modules')->where('id', $request->module_id)->first();

        $adminEmail = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('roles.title', 'Admin')
                ->pluck('users.email');

        // Send email notification
        Mail::to($mentee->email)->send(new ModuleCompletedNotification($mentor, $mentee, $module));

        Mail::to($adminEmail)->send(new AdminModuleCompletedNotification($mentor, $mentee, $module));


        return redirect()->back()->with('success', 'Module marked as completed and email sent.');
        }
    }
    
    public function moduleList()
    {
        $mentorEmail = Auth::user()->email;
        $mentor = DB::table('mentors')
        ->where('email', $mentorEmail)
        ->first();

        $sessions_list = DB::table('sessions')
        ->where('mentorname_id', $mentor->id)
        ->get();
        $totalSessions=$sessions_list->count();
        $totalMinutesMentored = 0;
        foreach ($sessions_list as $session) {
            if ($session->done === 'Yes') {
                $totalMinutesMentored += (int)$session->session_duration_minutes;
            }
        }
        $modules = DB::table('modules')->get();
        $sessions = [];
        foreach ($modules as $module) {
        // Check if any session exists for the module and mentee
        $session = DB::table('sessions')
            ->where('modulename_id', $module->id)
            ->where('mentorname_id', $mentor->id) // Check mentee ID
            ->get(); // Use get() to fetch multiple sessions
        // Add session(s) to sessions array
        if ($session->isNotEmpty()) {
            $sessions[$module->id] = $session;
        } else {
            $sessions[$module->id] = []; // Initialize as empty array if no sessions found
        }
          	// $modules=Module::all();

        return view('mentor.modules.moduleList',compact('modules','session','sessions_list','mentor'));
        }
    }
    // public function modulecompletionmail()
    // {
    //     // Step 1: Get the logged-in mentor
    //     $mentor = auth()->user(); // Assuming the mentor is logged in

    //     // Step 2: Fetch the mapped mentee details for the logged-in mentor
    //     $mapping = DB::table('mappings')
    //         ->where('mentor_email', $mentor->email)
    //         ->first();

    //     if (!$mapping) {
    //         return redirect()->back()->with('error', 'No mapped mentee found for this mentor.');
    //     }

    //     $mentee_id = $mapping->mentee_id;

    //     // Step 3: Get total chapters per module
    //     $moduleCounts = DB::table('chapters')
    //         ->select('module_id', DB::raw('COUNT(*) as total_chapters'))
    //         ->groupBy('module_id')
    //         ->get();

    //     // Step 4: Get completed chapters per module for the mapped mentee
    //     $completionStatus = DB::table('module_completion_tracker')
    //         ->select('module_id', DB::raw('COUNT(DISTINCT chapter_id) as completed_chapters'))
    //         ->where('mentee_id', $mentee_id)
    //         ->groupBy('module_id')
    //         ->get();

    //     // Step 5: Merge and check if all chapters are completed for the mapped mentee
    //     $completionCheck = [];

    //     foreach ($moduleCounts as $module) {
    //         // Find the completed chapters for the current module
    //         $status = $completionStatus->firstWhere('module_id', $module->module_id);
    //         $completedChapters = $status ? $status->completed_chapters : 0;
    //         $isCompleted = $module->total_chapters == $completedChapters;

    //         $completionCheck[] = [
    //             'mentee_id' => $mentee_id,
    //             'module_id' => $module->module_id,
    //             'total_chapters' => $module->total_chapters,
    //             'completed_chapters' => $completedChapters,
    //             'is_completed' => $isCompleted ? 'Yes' : 'No'
    //         ];
    //     }
    //         }
}