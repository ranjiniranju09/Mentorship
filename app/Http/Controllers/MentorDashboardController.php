<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class MentorDashboardController extends Controller
{
    //
   
    public function index()
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
    }


        return view('mentor.dashboard',compact('sessions_list','totalSessions','totalMinutesMentored','sessions','modules'));
    }

    public function markAsDone($id) {
    DB::table('sessions')
        ->where('id', $id)
        ->update(['done' => 'Yes']);
    
    // Redirect back or return a response
            //return Redirect::back()->with('success', 'Session marked as Completed successfully.');
            return redirect()->back()->with('success', 'Session marked as completed successfully.');


    }
        
}
