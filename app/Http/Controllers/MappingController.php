<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\MentorAssigned;
use App\Mail\MenteeAssigned;
use App\Mail\MentorshipMail;
use App\Models\Mentee;
use App\Models\Mentor;

class MappingController extends Controller
{
    public function map()
    {
        $mentees = Mentee::all();
        $mentors = Mentor::all();
        
        return view('mapping', compact('mentees', 'mentors'));
    }
    
    public function mappingstore(Request $request)
    {
        $menteeId = $request->input('mentee_id');
        $mentorId = $request->input('mentor_id');
        
        try {
            // Check if the mentor is already mapped to another mentee
            $existingMapping = DB::table('mentor_mentee_map')
                ->where('mentor_id', $mentorId)
                ->first();
            
            if ($existingMapping) {
                return redirect()->back()->with('error', 'The selected mentor is already mapped to another mentee!');
            }
            
            // Check if the mentee is already mapped to another mentor
            $existingMapping = DB::table('mentor_mentee_map')
                ->where('mentee_id', $menteeId)
                ->first();
            
            if ($existingMapping) {
                return redirect()->back()->with('error', 'The selected mentee is already mapped to another mentor!');
            }
            
            // If not, store the mapping in the database
            DB::table('mentor_mentee_map')->insert([
                'mentor_id' => $mentorId,
                'mentee_id' => $menteeId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Get mentor's email and name
            $mentor = DB::table('mentors')->select('email', 'name')->where('id', $mentorId)->first();
            $mentorEmail = $mentor->email;
            $mentorName = $mentor->name;

            Mail::to($mentorEmail)->send(new MentorAssigned($mentorName));
            
            // Get mentee's email and name
            $mentee = DB::table('mentees')->select('email', 'name')->where('id', $menteeId)->first();
            $menteeEmail = $mentee->email;
            $menteeName = $mentee->name;

            Mail::to($menteeEmail)->send(new MenteeAssigned($menteeName));



    
            // Compose email content
            // $mentorMailMessage = 'Hello ' . $mentorName . '! You have been selected as a mentor.';
            // $menteeMailMessage = 'Hello ' . $menteeName . '! You have been assigned a mentor.';
            // $mailSubject = 'Mentorship Update';
    
            // Send email to mentor
            // $mentorMailSent = mail($mentorEmail, $mailSubject, $mentorMailMessage);
    
            // Send email to mentee
           // $menteeMailSent = mail($menteeEmail, $mailSubject, $menteeMailMessage);
    
            // if (!$mentorMailSent || !$menteeMailSent) {
            //     return redirect()->back()->with('error', 'Failed to send emails.');
            // }
    
            return redirect()->back()->with('success', 'Mapping saved successfully and emails sent!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }    

    public function showMapping()
    {
        $mentors = Mentor::all()->map(function($mentor) {
            $mentor->is_mapped = $mentor->mentees()->exists();
            return $mentor;
        });
        
        $mentees = Mentee::all()->map(function($mentee) {
            $mentee->is_mapped = $mentee->mentor()->exists();
            return $mentee;
        });
    
        return view('map', compact('mentors', 'mentees'));
    }
}
