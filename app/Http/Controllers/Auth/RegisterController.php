<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

         /**
          * Create a new user instance after a valid registration.
          *
          * @param  array  $data
          * @return \App\User
          */
        protected function create(array $data)
        {
            return User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
         
        public function menteeshow()
        {
            return view('auth.menteereg');
        }
        public function registermentee(Request $request)
        {
            // Validate the input data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'mobile' => 'required|string|regex:/[6789][0-9]{9}/',
                'date' => 'required|date',
                'skills' => 'required|string|max:255',
                'interested_skills' => 'required|string|max:255'
            ]);

            // Insert new user entry and get the user ID
            $userId = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Insert new mentee entry using the user ID
            DB::table('mentees')->insert([
                'id' => $userId, // Assuming the mentees table uses the same ID
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'dob' => $request->date,
                'skills' => $request->skills,
                'interestedskills' => $request->interested_skills,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Prepare the entered details
            // $enteredDetails = [
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'mobile' => $request->mobile,
            //     'dob' => $request->date,
            //     'skills' => $request->skills,
            //     'interested_skills' => $request->interested_skills,
            // ];

            // $user = (object)[
            //         'name' => $enteredDetails['name'],
            //         'email' => $enteredDetails['email']
            //     ];

            // Determine the role for the email
            $role = 'Mentee';

            // Fetch admin email addresses
            $adminEmail = DB::table('users')
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('roles.title', 'Admin')
                ->pluck('users.email');

            // Send email notification to admin
            Mail::to($adminEmail)->send(new NewUserNotification($userId, $role));

            // Return success message if mail sent successfully
            return redirect()->back()->with('success', 'Registration successful! Email notification has been sent.');

            // Alternatively, return a view with the data
            // return view('auth.menteereg')->with(compact('enteredDetails', 'role', 'adminEmail'));
        }

        public function mentorshow()
        {
            return view('auth.mentorreg');
        }


    public function registermentor(Request $request)
    {
        // Prepare the entered details
        $request->validate([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'companyname' => $request->input('companyname'),
            'skills' => $request->input('skill'),
        ]);

        // Insert new user entry
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert new mentor entry and get the mentor ID
            $mentorId = DB::table('mentors')->insertGetId([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'companyname' => $request->input('companyname'),
                'skills' => $request->input('skill'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        // $user = (object)[
        //     'name' => $enteredDetails['name'],
        //     'email' => $enteredDetails['email']
        // ];

        // Fetch the newly created mentor details
        $user = DB::table('mentors')->where('id', $mentorId)->first();

        // Prepare the role for email
        $role = 'Mentor';

        // Fetch admin email addresses
        $adminEmail = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('roles.title', 'Admin')
            ->pluck('users.email');

            // dd($enteredDetails);

        // Send email notification to admin
        Mail::to($adminEmail)->send(new NewUserNotification($user, $role));

        // Return the details as a response
        // return [
        //     'enteredDetails' => $enteredDetails,
        //     'role' => $role,
        //     'adminEmail' => $adminEmail
        // ];

                    // Return success message if mail sent successfully
            return redirect()->back()->with('success', 'Registration successful! Email notification has been sent.');
       
            // Handle exceptions, return error message
            return redirect()->back()->with('error', 'Registration successful, but an error occurred while sending the email: ' . $e->getMessage());
        
    }


}
