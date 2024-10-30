<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\MentorMenteeMap;

class MenteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function menteedash(Request $request)
    {
        // Get the logged-in mentee's ID
        $menteeId = $request->user()->id;

        // Find the mentor assigned to the mentee
        $mentorMap = MentorMenteeMap::where('mentee_id', $menteeId)->first();
        // Pass data to the view
        return view('mentees', ['menteeId' => $menteeId]);
    }
    

    public function showAssignedMentor(Request $request)
    {
        // Get the logged-in mentee's ID
        $menteeId = $request->user()->id;

        // Find the mentor assigned to the mentee
        $mentorMap = MentorMenteeMap::where('mentee_id', $menteeId)->first();

        if ($mentorMap) {
            // Mentor found, now get mentor details
            $mentor = mentor::find($mentorMap->mentor_id);

            return view('assigned_mentor', ['mentor' => $mentor]);
        } else {
            // No mentor assigned
            return view('no_assigned_mentor');
        }
    }
    public function show()
    {
        return view('dashboardmentee');
    }
    public function task()
    {
        return view('Task');
    }

    public function modules()
    {
        return view('modules');
    }

    public function chapters()
    {
        return view('chapter-details');
    }
    public function JsIntro()
    {
        return view('Jsintroduction');
    }
    public function publicresources()
    {
        return view('publicresources');
    }
    public function displayresources()
    {
        return view('displayresources');
    }
    public function calender()
    {
        return view('calender');
    }

    public function tickets()
    {
        return view('tickets');
    }
    public function opportunities()
    {
        return view('jobs');
    }
    public function jobdetails1()
    {
        return view('jobdetails');
    }
    public function sessionmentee()
    {
        return view('sessionmentee');
    }
    public function menteeprofile()
    {
        return view('menteeprofile');
    }
}
