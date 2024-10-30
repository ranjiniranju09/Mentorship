<?php

namespace App\Http\Controllers\Mentee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\QuizSubmittedNotification;
use App\Mail\QuizSubmittedToMentee;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Mentor;
use App\Mentee;
use App\AssignTask;
use Illuminate\Support\Facades\Redirect;
use App\Module;
use App\Chapter;
use App\Subchapter;
use App\Test;
use App\Question;
use App\QuestionOption;
use App\QuizResult;
use App\Moduleresourcebank;
use App\Ticketcategory;
use App\TicketDescription;
class MenteeModuleController extends Controller
{
	public function index()
    {
    	$modules=Module::all();
    	return view('mentee.modules.index',compact('modules'));
    }

    public function showchapters(Request $request)
    {
    	$module_id = $request->query('module_id');
    	$chapters = Chapter::where('module_id', $module_id)->get();

    	return view('mentee.modules.chapters',compact('chapters'));
    }
    public function subchaptercontent(Request $request)
    {

    	$chapter_id = $request->query('chapter_id');


    	$current_subchapter_id = $request->query('chapter_id');
    	// Get all subchapters of the chapter
    	$subchapters = Subchapter::where('chapter_id', $chapter_id)->get();
    	// Get the current subchapter
    	$current_subchapter = Chapter::find($current_subchapter_id);
    	$previousSubchapter='';
    	$nextSubchapter='';
    	/*
    	// Find previous and next subchapters
    	$previousSubchapter = Chapter::where('chapter_id', $chapter_id)
                                    ->where('id', '<', $current_subchapter_id)
                                    ->orderBy('id', 'desc')
                                    ->first();
         return     $previousSubchapter;                      
    	$nextSubchapter = Chapter::where('chapter_id', $chapter_id)
                                ->where('id', '>', $current_subchapter_id)
                                ->orderBy('id')
                                ->first();


		*/

        $moduleresources = Moduleresourcebank::where('chapterid_id', $chapter_id)->get();
                        
        return view('mentee.modules.subchapters', compact('subchapters', 'current_subchapter', 'previousSubchapter', 'nextSubchapter','moduleresources'));

    }

    public function viewquiz(Request $request)
    {
    	$chapterId=$request->chapter_id;
    	$chapter = Chapter::findOrFail($chapterId);

    	$tests = Test::where('chapter_id', $chapterId)->with('questions.options')->get();
    	//return $tests;
    	return view('mentee.modules.viewquiz',compact('chapter','tests'));
    }

    public function submitQuiz(Request $request)
    {
        $score = 0;
        $totalPoints = 0;
    
        // Calculate score
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'question_') === 0) {
                $questionId = str_replace('question_', '', $key);
                $selectedOptionId = $value;
    
                $question = Question::find($questionId);
                $correctOption = $question->options()->where('is_correct', true)->first();
    
                $totalPoints += $question->points;
    
                if ($correctOption && $correctOption->id == $selectedOptionId) {
                    $score += $question->points;
                }
            }
        }
    
        // Store quiz result using Query Builder
        // $quizResultId = DB::table('quiz_results')->insertGetId([
        //     'user_id' => auth()->user()->id,
        //     'module_id' => $request->module_id,
        //     'score' => $score,
        //     'total_points' => $totalPoints,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    

        $quizResultId=0;
        
        // Fetch the stored quiz result details
        $quizResult = DB::table('quiz_results')->where('id', $quizResultId)->first();
    
        // Fetch the logged-in user's email
        $userEmail = auth()->user()->email;
    
        // Fetch mentee details using the user's email
        $mentee = DB::table('mentees')
            ->join('users', 'users.email', '=', 'mentees.email')
            ->where('users.email', $userEmail)
            ->select('mentees.id as mentee_id', 'mentees.name as mentee_name', 'mentees.email')
            ->first();
    
        if (!$mentee) {
            return redirect()->back()->with('error', 'Mentee details not found.');
        }
    
        // Fetch the mapped mentor details using the mentee_id
        $mentor = DB::table('mentors')
            ->join('mappings', 'mentors.id', '=', 'mappings.mentorname_id')
            ->where('mappings.menteename_id', $mentee->mentee_id)
            ->select('mentors.email', 'mentors.name')
            ->first();
    

            return [
                'mentor' => $mentor,
                'mentee' => $mentee,
                
            ];

        if ($mentor) {
            // Send email notification to mentor
            Mail::to($mentor->email)->send(new QuizSubmittedNotification($mentee, $mentor, $quizResult));
    
            // Send email to the mentee
            Mail::to($mentee->email)->send(new QuizSubmittedToMentee($mentee, $quizResult->score));
    
            return redirect()->back()->with('message', 'Quiz submitted successfully! Your score is: ' . $quizResult->score);
        } else {
            return redirect()->back()->with('error', 'Mentor details not found for the mentee.');
        }
    }
    



    

    // public function menteetickets()
    // {
    //     //$tickets=TicketDescription::all();
    //     $tickets = TicketDescription::where('user_id', Auth::id())->get();
    //     //return $tickets;
    //     return view('mentee.tickets.index' ,compact('tickets'));


    // }
    // public function ticketscreate()
    // {
    //     //$ticket_categories=Ticketcategory::all();
    //     $ticket_categories = Ticketcategory::pluck('category_description', 'id');
    //     return view('mentee.tickets.create',compact('ticket_categories'));
    // }
    // public function ticketstore(Request $request)
    // {
    //     //return $request;
    //     $ticketDescription = new TicketDescription();
    //     $ticketDescription->ticket_category_id = $request->ticket_category_id;
    //     $ticketDescription->ticket_description = $request->ticket_description;
    //     $ticketDescription->user_id = $request->user_id;
    //     $ticketDescription->save();
    //     //return redirect()->back()->with('success', 'Ticket created successfully!');
    //     return redirect()->route('mentee.tickets')->with('success', 'Ticket created successfully!');


    // }
    
}