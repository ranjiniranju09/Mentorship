<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade

class JobController extends Controller
{
    // Display the job form
    public function jobs($mentorId)
    {
        return view('jobs', compact('mentorId'));
    }
    public function adminjobs()
    {
        return view('adminjobs');
    }

    // Store the job details
    public function store(Request $request, $mentorId)
    {
        DB::table('jobs')->insert([
            'mentorId' => $mentorId,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'company' => $request->input('company'),
            'location' => $request->input('location'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Return to the job form with a success message
        return view('jobs', ['success' => 'Job added successfully.', 'mentorId' => $mentorId]);
    }

    public function adminjobstore(Request $request)
    {
        DB::table('jobs')->insert([
            'mentorId' => 'admin',
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'company' => $request->input('company'),
            'location' => $request->input('location'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Return to the job form with a success message
        return view('adminjobs', ['success' => 'Job added successfully.']);
    }

    // Display the list of jobs
    public function view(Request $request, $mentorId)
    {
        $query = DB::table('jobs');
    
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }
    
        $jobs = $query->get();
    
        return view('viewjobs', compact('jobs', 'mentorId'));
    }
}
