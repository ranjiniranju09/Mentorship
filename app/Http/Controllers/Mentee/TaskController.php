<?php

namespace App\Http\Controllers\Mentee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail; 
use App\Mail\TaskSubmittedNotification;
use App\Mail\TaskSubmittedToMentee; 
use App\Mail\TaskSubmittedToMentor; 
use App\Mentor;
use App\Mentee;
use App\AssignTask;
use App\Http\Requests\StoreAssignTaskRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class TaskController extends Controller
{
    //
    use MediaUploadingTrait;
    public function index()
{
    // Get the logged-in user's email
    $email = Auth::user()->email;

    // Find the Mentee associated with the email or return a 404 error if not found
    $mentee = Mentee::where('email', $email)->firstOrFail();

    // Fetch all tasks for the mentee in one query
    $tasks = AssignTask::where('mentee_id', $mentee->id)->get();

    // Separate tasks into unsubmitted and submitted
    $unsubmittedTasks = $tasks->filter(function ($task) {
        return is_null($task->task_response);
    });

    $submittedTasks = $tasks->filter(function ($task) {
        return !is_null($task->task_response);
    });

    // Pass data to the view
    return view('mentee.tasks.index', compact('mentee', 'tasks', 'unsubmittedTasks', 'submittedTasks'));
}

    /*
    public function submit(Request $request)
{
    try {
        // Retrieve the task by ID
        $task = AssignTask::findOrFail($request->task_id);
        
        // Update the task response
        $task->task_response = $request->task_response;
        
        // Initialize an array to collect any failed uploads
        $failedUploads = [];

        // Handle attachments if needed
        if ($request->has('attachments')) {
            foreach ($request->file('attachments') as $file) {
                try {
                    // Store the attachment using Spatie MediaLibrary
                    $media = $task->addMedia($file)->toMediaCollection('attachments', 's3');
                } catch (\Exception $e) {
                    // If an error occurs, add the file to the failed uploads array
                    $failedUploads[] = $file->getClientOriginalName();
                }
            }
        }

        // Update CKEditor media if it exists
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $task->id]);
        }

        // Save the task
        $task->save();

        // Check if there were any failed uploads
        if (!empty($failedUploads)) {
            // Log the failed uploads (or handle as needed)
            \Log::error('Failed to upload the following files:', $failedUploads);
            // Optionally, you could return a message or redirect with the failed uploads
            return redirect()->back()->withErrors(['Failed to upload some files. Please try again.']);
        }

        // Retrieve the mentee information
        $menteeEmail = Auth::user()->email;
        $mentee = Mentee::where('email', $menteeEmail)->first();
        if (!$mentee) {
            return 'Mentee not found.';
        }

        // Retrieve all tasks for the mentee
        $tasks = AssignTask::where('mentee_id', $mentee->id)->get();

        // Return the view with updated data
        return view('mentee.tasks.index', compact('mentee', 'tasks'));
    } catch (\Exception $e) {
        // Handle any unexpected errors here
        \Log::error('Error submitting task:', ['error' => $e->getMessage()]);
        return redirect()->back()->withErrors(['An unexpected error occurred. Please try again.']);
    }
}*/
/*
public function submit(Request $request)
{
    try {
        // Retrieve the task by ID
        $task = AssignTask::findOrFail($request->task_id);
        
        // Update the task response
        $task->task_response = $request->task_response;
        
        // Initialize an array to collect any failed uploads
        $failedUploads = [];

        // Handle attachments if needed
        if ($request->has('attachments')) {
            foreach ($request->file('attachments') as $file) {
                try {
                    // Store the attachment using Spatie MediaLibrary
                    $media = $task->addMedia($file)->toMediaCollection('attachments', 's3');
                } catch (\Exception $e) {
                    // If an error occurs, add the file to the failed uploads array
                    $failedUploads[] = $file->getClientOriginalName();
                }
            }
        }

        // Update CKEditor media if it exists
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $task->id]);
        }

        // Save the task
        $task->save();

        // Check if there were any failed uploads
        if (!empty($failedUploads)) {
            // Log the failed uploads (or handle as needed)
            \Log::error('Failed to upload the following files:', $failedUploads);
            // Return a response indicating failure
            return response()->json(['success' => false, 'message' => 'Failed to upload some files. Please try again.'], 422);
        }

        // Retrieve the mentee information
        $menteeEmail = Auth::user()->email;
        $mentee = Mentee::where('email', $menteeEmail)->first();
        if (!$mentee) {
            return response()->json(['success' => false, 'message' => 'Mentee not found.'], 404);
        }

        // Retrieve all tasks for the mentee
        $tasks = AssignTask::where('mentee_id', $mentee->id)->get();

        // Return a success response with updated data
        return response()->json(['success' => true, 'data' => ['mentee' => $mentee, 'tasks' => $tasks]], 200);

    } catch (\Exception $e) {
        // Handle any unexpected errors here
        \Log::error('Error submitting task:', ['error' => $e->getMessage()]);
        return response()->json(['success' => false, 'message' => 'An unexpected error occurred. Please try again.'], 500);
    }
}
*/

public function submit(Request $request)
{
    // Validate the request
    $request->validate([
        'task_response' => 'required|string|max:255',
        'submitted_file' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls,zip,jpg,jpeg,png|max:20480',
    ]);

    // Retrieve the task ID from the form
    $taskId = $request->input('task_id');

    // Initialize variable for file URL
    $submittedFileUrl = null;

    // Handle file upload for submitted_file
    if ($request->hasFile('submitted_file')) {   
        $file = $request->file('submitted_file');
        $filePath = 'submittedtasks/' . uniqid() . '_' . $file->getClientOriginalName();
        
        // Upload to S3
        $uploaded = Storage::disk('s3')->put($filePath, file_get_contents($file));

        if ($uploaded) {
            // Construct the S3 URL based on the bucket's region and endpoint
            $bucket = env('AWS_BUCKET');
            $region = env('AWS_DEFAULT_REGION');
            $baseUrl = "https://{$bucket}.s3.{$region}.amazonaws.com/";
            $submittedFileUrl = $baseUrl . $filePath;
        }
    }
    
    // Update the task with task_response and submitted_file
    DB::table('assign_tasks')->where('id', $taskId)->update([
        'task_response' => $request->task_response,
        'submitted_file' => $submittedFileUrl,
        'submitted' => 1, // Mark the task as submitted
        'updated_at' => now(),
    ]);

    // Fetch mentor and mentee details
    $taskDetails = DB::table('assign_tasks')->where('id', $taskId)->first();
    
    $mentor = DB::table('mentors')->where('id', $taskDetails->mentor_id)->first(); // Adjust this line based on your mentor retrieval logic
    $mentee = DB::table('mentees')->where('id', $taskDetails->mentee_id)->first(); // Adjust this line based on your mentee retrieval logic

    // Send email notification to mentor about task submission
    if ($mentor) {
        Mail::to($mentor->email)->send(new TaskSubmittedToMentor($mentee, $request->task_response, $submittedFileUrl)); // Adjust params as needed
    }

    // Send email notification to mentee
    if ($mentee) {
        Mail::to($mentee->email)->send(new TaskSubmittedToMentee($mentee, $request->task_response, $submittedFileUrl)); // Adjust params as needed
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Task submitted successfully.');
}






/*public function storeCKEditorImages(Request $request)
{
    try {
        $model = AssignTask::findOrFail($request->input('crud_id', 0));

        if (!$model) {
            return response()->json(['message' => 'Invalid model ID'], Response::HTTP_BAD_REQUEST);
        }

        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json([
            'id' => $media->id,
            'url' => $media->getUrl()
        ], Response::HTTP_CREATED);
    } catch (\Exception $e) {
        Log::error('Error storing CKEditor image: ' . $e->getMessage());
        return response()->json(['message' => 'Failed to upload image'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
} */
}
    
