<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\MentorMenteeMap;
use App\Models\Mentor;
use App\Models\Mentee;
use App\Models\Login;
use App\Models\Session;
use PhpParser\Node\Stmt\Return_;


class LoginRegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('login');
    }

    public function register1()
    {
        return view('menteeregister');
    }
    public function register2()
    {
        return view('mentorregister');
    }

    public function tickets()
    {
        return view('tickets');
    }

    public function registermentee(Request $request)
    {
        $menteeId = DB::table('mentees')->insertGetId([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'skills' => $request->input('skills'),
            'interested_skills' => $request->input('interested_skills'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('logins')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'username' => $request->input('username'),
            'role' => 'mentee',
            'password' => bcrypt($request->input('password')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Mentee registered successfully!');
    }

    public function registermentor(Request $request)
    {
        $mentorId = DB::table('mentors')->insertGetId([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'skill' => $request->input('skill'),
            'language' => $request->input('language'),
            'companyname' => $request->input('companyname'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('logins')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'username' => $request->input('username'),
            'role' => 'mentor',
            'password' => bcrypt($request->input('password')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Mentor registered successfully!');
    }

    public function show(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('logins')
            ->where('username', $username)
            ->first();

        if ($user) {
            if (password_verify($password, $user->password)) {

                if ($user->role === 'mentor') {

                  $mentorId = DB::table('mentors')
                    ->where('mobile', $user->mobile)
                    ->value('id');
                    
                    // $mentorId = $user->id;

                    session(['mentor_id' => $mentorId]);

                    // Fetch past and upcoming sessions for the specified mentor
                    $pastSessions = DB::table('sessions')
                    ->where('mentorId', $mentorId)
                    ->whereDate('date', '<', now())
                    ->get();
                                
                    // Fetch upcoming sessions for the specified mentor
                    $upcomingSessions = DB::table('sessions')
                                            ->where('mentorId', $mentorId)
                                            ->whereDate('date', '>=', now())
                                            ->get();


                    return view('mentor', compact('pastSessions', 'upcomingSessions','mentorId'));

                } elseif ($user->role === 'mentee') {

                    // $menteeId = $user->id;
                
                    $menteeId = DB::table('mentees')
                        ->where('email', $user->email)
                        ->value('id');
                
                    $assignedMentor = DB::table('mentor_mentee_map')
                        ->where('mentee_id', $menteeId)
                        ->first();
                
                    $assignedMentor1 = DB::table('mentors')
                        ->where('id', $assignedMentor->mentor_id)
                        ->first();
                
                    // Define the mentor ID
                    $mentorId = $assignedMentor1->id;
                
                    $assignedSession = DB::table('sessions')
                        ->where('mentorId', $mentorId)
                        ->get();
                
                    $pastSessions = DB::table('sessions')
                        ->where('mentorId', $mentorId)
                        ->whereDate('date', '<', now())
                        ->get();
                
                    // Fetch upcoming sessions for the specified mentor
                    $upcomingSessions = DB::table('sessions')
                        ->where('mentorId', $mentorId)
                        ->whereDate('date', '>=', now())
                        ->get();

                    return view('mentees', compact('pastSessions', 'upcomingSessions', 'assignedMentor1','assignedSession','menteeId'));
                    
                } elseif ($user->role === 'admin') {
                    $mappingData = DB::table('mentor_mentee_map')
                        ->join('mentors', 'mentor_mentee_map.mentor_id', '=', 'mentors.id')
                        ->join('mentees', 'mentor_mentee_map.mentee_id', '=', 'mentees.id')
                        ->select('mentors.name as mentor_name', 'mentees.name as mentee_name')
                        ->get();

                    return view('admin', compact('mappingData'));
                } else {
                    return "Invalid role";
                }
            } else {
                return "Invalid username or password";
            }
        } else {
            return "User not found";
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
