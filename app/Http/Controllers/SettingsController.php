<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
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
     * Show the settings for this account.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings/index');
    }
}
