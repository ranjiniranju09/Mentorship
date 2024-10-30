<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizprogressController extends Controller
{
    public function quizprogress()
{
    // Calculate total quizzes
    $totalQuizzes = DB::table('tests')->count();

    // Calculate completed quizzes by counting unique quizzes in the quiz_results table
    $completedQuizzes = DB::table('quiz_results')
        ->distinct('id') // Ensure you count distinct quizzes
        ->count('id');

    // Calculate pending quizzes
    $totalPendingQuizzes = $totalQuizzes - $completedQuizzes;

    // Fetch completed quizzes per module
    $modulewiseComplete = DB::table('quiz_results')
        ->join('modules', 'quiz_results.module_id', '=', 'modules.id')
        ->select('modules.name as module_name', DB::raw('COUNT(*) as completed_tests'))
        ->groupBy('modules.name')
        ->pluck('completed_tests', 'module_name'); // Associative array

    // Fetch total quizzes count per module
    $totalQuizzesPerModule = DB::table('tests')
        ->join('modules', 'tests.module_id', '=', 'modules.id')
        ->select('modules.name as module_name', DB::raw('COUNT(*) as total_tests'))
        ->groupBy('modules.name')
        ->pluck('total_tests', 'module_name'); // Associative array

    // Calculate module-wise pending quizzes
    $modulewisePending = $totalQuizzesPerModule->mapWithKeys(function ($total, $module) use ($modulewiseComplete) {
        return [$module => $total - ($modulewiseComplete[$module] ?? 0)];
    });

    // Prepare data for the view
    $modules = [
        'moduleNames' => $totalQuizzesPerModule->keys(),
        'totalQuizzes' => $totalQuizzesPerModule->values(),
        'completedQuizzes' => $modulewiseComplete->values(),
        'pendingQuizzes' => $modulewisePending->values(),
    ];

    // Pass data to view
    return view('admin.quizprogress.adminquizprogress', [
        'totalQuizzes' => $totalQuizzes,
        'completedQuizzes' => $completedQuizzes,
        'totalPendingQuizzes' => $totalPendingQuizzes,
        'modules' => $modules,
    ]);
}

}
