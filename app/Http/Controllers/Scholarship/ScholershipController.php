<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScholershipController extends Controller
{
    public function show()
    {
        return view('scholarship.index');
    }
    public function store()
    {
        return view('scholarship.register');
    }
    public function newlogin()
    {
        return view('scholarship.newlogin');
    }
}
