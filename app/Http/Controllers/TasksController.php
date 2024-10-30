<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tasks;


class TasksController extends Controller
{
    public function ShowTask($mentorId)
    {
    
        // Retrieve the task by its ID using SQL query builder
        $task = DB::table('tasks')->get();
    
        return view('AssignedTask',compact('mentorId'));
       
    }
    public function StoreTask(Request $request, $mentorId)
    {
        
        $task = DB::table('tasks')->get();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Store the uploaded file
            $filePath = $file->store('uploads', 'public'); // 'uploads' is the directory where files will be stored
        } else {
            $filePath = null;
        }
    
        // Insert the task data into the database using SQL query builder
        $taskId = DB::table('tasks')->insertGetId([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'file_path' => $filePath,
            'mentor_id' => $mentorId, // Save the mentor's ID passed from the route
            'created_at' => now(), // Set the created_at timestamp
            'updated_at' => now(), // Set the updated_at timestamp
        ]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Task created successfully.');
    }
   
}

