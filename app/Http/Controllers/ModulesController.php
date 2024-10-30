<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules; // Corrected the import statement for the Module model
use Illuminate\Support\Facades\DB;

class ModulesController extends Controller
{
    public function modules($mentorId)
    {

        // $modules = Modules::with('chapters')->get(); // Eager load chapters
        // return view('modules', compact('mentorId', 'modules'));


        // Retrieve modules with their associated chapters using SQL query builder
        $modules = DB::table('modules')
                    ->join('chapters', 'modules.id', '=', 'chapters.module_id')
                    ->select('modules.*', 'chapters.title as chapter_title', 'chapters.description as chapter_description')
                    ->get();

        return view('modules', compact('mentorId', 'modules'));
    }

    public function chapters()
    {
        return view('chapter-details');
    }

    public function chapterscontent()
    {
        return view('chapter-content');
    }

    public function quiz()
    {
        return view('quiz');
    }
    public function quizJsIntro()
    {
        return view('quizJsIntro');
    }
    public function moduleresources()
    {
        return view('moduleresources');
    }
    public function displaymoduleresources()
    {
        return view('displaymoduleresources');
    }
}

