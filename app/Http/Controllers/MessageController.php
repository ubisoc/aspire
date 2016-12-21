<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
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
     * Show the list of messages this student has received and sent.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('messages/index');
    }
}
