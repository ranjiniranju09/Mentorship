<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\User; // Ensure the User model is imported
use Illuminate\Support\Facades\DB; // Ensure the DB facade is imported
use Illuminate\Support\Facades\Mail; // Ensure the Mail facade is imported
use App\Mail\Sessionmail; // Ensure the Sessionmail is imported

class SessionController extends Controller
{
    public function session(Request $request)
    {
        $loggedInMentorId = $request->input('mentorId');
    
        // Retrieve sessions belonging to the logged-in mentor
        $sessions = Session::where('mentorId', $loggedInMentorId)->get();
        $pastSessions = Session::where('mentorId', $loggedInMentorId)
                                ->whereDate('date', '<', now())
                                ->get();
        $upcomingSessions = Session::where('mentorId', $loggedInMentorId)
                                    ->whereDate('date', '>=', now())
                                    ->get();
                                    
        return view('sessions', compact('sessions', 'pastSessions', 'upcomingSessions', 'loggedInMentorId'));
    }
    
    public function sessionstore(Request $request)
    {
        // Retrieve mentorId from session
        $mentorId = session('mentor_id');

        // Insert session into the database
        $session = DB::table('sessions')->insertGetId([
            'mentorId' => $mentorId,
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'status' => 'open',
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'slink' => $request->input('slink'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Retrieve the newly created session
        $newSession = Session::find($session);

        // Get the mentees mapped to this mentor
        $mentees = User::where('mentor_id', $mentorId)->get();

        // Send email notification to each mentee
        foreach ($mentees as $mentee) {
            Mail::to($mentee->email)->send(new Sessionmail($newSession));
        }

        // Redirect or return view with sessions data
        return redirect()->route('session')->with('success', 'Session added successfully.');
    }

    public function sessionupdate(Request $request, $id)
    {
        $updated = DB::table('sessions')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'status' => $request->status,
                'updated_at' => now(),
            ]);

        if ($updated) {
            return back()->with('success', 'Session updated successfully.');
        } else {
            return back()->with('error', 'Unable to update session.');
        }
    }

    public function sessiondelete($id)
    {
        // No action performed in this method as per your request
        return view('sessions');
    }

    public function sessionjoin($id)
    {
        $session = DB::table('sessions')->where('id', $id)->first();

        if ($session && $session->slink) {
            return redirect($session->slink);
        } else {
            return back()->with('error', 'Unable to join session. GMeet link not available.');
        }
    }

    public function menteesession()
    {
        $sessions = DB::table('sessions')->get();
        return view('menteesession', compact('sessions'));
    }

    public function feedbackshow($id)
    {
        // Assuming you have a feedback form route and view set up
        $sessions = DB::table('sessions')->where('id', $id)->first();

        return view('sessionfeedback', compact('sessions'));
    }

    public function storefeedback(Request $request, $id)
    {
        // Check if the session exists
        $session = DB::table('sessions')->where('id', $id)->first();
        if (!$session) {
            return redirect()->back()->with('error', 'Session not found.');
        }
    
        // Check if feedback already exists for this session
        $existingFeedback = DB::table('feedback')->where('id', $id)->exists();
        if ($existingFeedback) {
            return redirect()->back()->with('error', 'Feedback already submitted for this session.');
        }
    
        // Insert new feedback record
        $feedbackInserted = DB::table('feedback')->insert([
            'feedback' => $request->input('feedback'),
            'rating' => $request->input('rating'),
        ]);
    
        if ($feedbackInserted) {
            // Redirect back with success message if feedback inserted successfully
            return redirect()->back()->with('success', 'Feedback submitted successfully.');
        } else {
            // Redirect back with error message if feedback insertion failed
            return redirect()->back()->with('error', 'Failed to submit feedback.');
        }
    }

    public function markAttendance($id)
    {
        // Retrieve the session by its ID
        $session = Session::find($id);

        // Check if the session exists
        if (!$session) {
            return redirect()->back()->with('error', 'Session not found.'); // Redirect back with an error message
        }

        // Mark the session as attended by updating the 'attendance' column
        $session->attendance = true;

        // Save the changes to the session
        $session->save();

        return redirect()->back()->with('success', 'Attendance marked successfully.'); // Redirect back with a success message
    }
}
