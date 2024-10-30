<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function quizdetails()
    {
        // Fetch completed quizzes count
        $completedQuizzes = DB::table('quiz_results')
            ->join('users', 'quiz_results.user_id', '=', 'users.id')
            ->join('mentees', 'users.email', '=', 'mentees.email')
            ->join('mappings', 'mentees.id', '=', 'mappings.menteename_id')
            ->whereNotNull('quiz_results.score')
            ->count(); // Directly count the number of completed quizzes

        // Fetch total quizzes count
        $testsCount = DB::table('tests')->count();

        // Calculate pending quizzes
        $pendingQuizzes = $testsCount - $completedQuizzes;

        // Fetch completed quizzes per module
        $modulewiseComplete = DB::table('quiz_results')
            ->join('users', 'quiz_results.user_id', '=', 'users.id')
            ->join('mentees', 'users.email', '=', 'mentees.email')
            ->join('mappings', 'mentees.id', '=', 'mappings.menteename_id')
            ->join('modules', 'quiz_results.module_id', '=', 'modules.id')
            ->select('modules.name as module_name', DB::raw('COUNT(*) as completed_tests'))
            ->groupBy('modules.name')
            ->pluck('completed_tests', 'module_name'); // Associative array

        // Fetch total quizzes count per module
        $totalQuizzes = DB::table('tests')
            ->join('modules', 'tests.module_id', '=', 'modules.id')
            ->select('modules.name as module_name', DB::raw('COUNT(*) as total_tests'))
            ->groupBy('modules.name')
            ->pluck('total_tests', 'module_name'); // Associative array

        // Calculate module-wise pending quizzes
        $modulewisePending = DB::table('tests')
            ->join('modules', 'tests.module_id', '=', 'modules.id')
            ->leftJoinSub(
                DB::table('quiz_results')
                    ->join('users', 'quiz_results.user_id', '=', 'users.id')
                    ->join('mentees', 'users.email', '=', 'mentees.email')
                    ->join('mappings', 'mentees.id', '=', 'mappings.menteename_id')
                    ->join('modules', 'quiz_results.module_id', '=', 'modules.id')
                    ->select('modules.name as module_name', DB::raw('COUNT(*) as completed_tests'))
                    ->groupBy('modules.name'),
                'completed',
                'modules.name',
                '=',
                'completed.module_name'
            )
            ->select('modules.name as module_name',
                DB::raw('COUNT(tests.id) as total_tests'),
                DB::raw('COALESCE(completed.completed_tests, 0) as completed_tests')
            )
            ->groupBy('modules.name')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->module_name => $item->total_tests - $item->completed_tests];
            });

        // Prepare data for the view
        $modules = [];
        foreach ($totalQuizzes as $module => $total) {
            $modules[] = [
                'name' => $module,
                'completed' => $modulewiseComplete[$module] ?? 0,
                'pending' => $modulewisePending[$module],
                'score' => $this->calculateScore($module), // Assuming you have a method to calculate the score
                'chapters' => $this->getChaptersForModule($module) // Assuming you have a method to get chapters for the module
            ];
        }

        // Calculate overall completed and pending quizzes
        $overallCompletedQuizzes = $completedQuizzes;
        $overallPendingQuizzes = $totalQuizzes->sum() - $overallCompletedQuizzes;

        // Pass data to the view
        return view('mentor.quiz.quizdetails', [
            'completedQuizzes' => $completedQuizzes,
            'pendingQuizzes' => $pendingQuizzes,
            'modulewiseComplete' => $modulewiseComplete,
            'totalQuizzes' => $totalQuizzes,
            'modulewisePending' => $modulewisePending,
            'modules' => $modules, // Add this if needed in the view
            'overallCompletedQuizzes' => $overallCompletedQuizzes,
            'overallPendingQuizzes' => $overallPendingQuizzes,
        ]);
    }

    private function calculateScore($module)
    {
        // Implement your logic to calculate the score for the given module
        return rand(50, 100); // Placeholder
    }

    private function getChaptersForModule($module)
    {
        // Implement your logic to retrieve chapters for the given module
        return [
            ['name' => 'Chapter 1', 'status' => 'Completed', 'score' => 80],
            ['name' => 'Chapter 2', 'status' => 'Pending', 'score' => 0],
            // Add more chapters as needed
        ];
    }
}
