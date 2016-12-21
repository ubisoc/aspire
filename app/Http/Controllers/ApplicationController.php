<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the list of applications the student has made.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('applications/index');
    }
}
