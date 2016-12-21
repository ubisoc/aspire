<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
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
     * Show the list of notifications this student has received.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notifications/index');
    }
}
