<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    // public function mentor()
    // {
    //     return view('mentor');
    // }

    public function dashboardmentor()
    {
        return view('dashboardmentor');
    }
    public function mentorsessionadd()
    {
        return view('mentorsessionadd');
    }
    public function mentortaskadd()
    {
        return view('mentortaskadd');
    }

    public function mentorprofile()
    {
        return view('mentorprofile');
    }
    public function mentorresourceadd()
    {
        return view('mentorresourceadd');
    } 
    public function totalquiz()
    {
        return view('totalquiz');
    }
    public function mentorjobs()
    {
        return view('mentorjobs');
    }
    public function menteemoduleprogress()
    {
        return view('menteemoduleprogress');
    }
    public function menteequizprogress()
    {
        return view('menteequizprogress');
    }
    public function menteetaskprogress()
    {
        return view('menteetaskprogress');
    }
    public function menteesessionprogress()
    {
        return view('menteesessionprogress');
    }



    // public function sidebar()
    // {
    //     return view('sidebar');
    // }
}
