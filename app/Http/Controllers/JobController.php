<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyData;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param CompanyData $companies
     * @return void
     */
    public function __construct(CompanyData $companies)
    {
        $this->middleware('auth');
        $this->companies = $companies;
    }

    /**
     * Show the list of Jobs this student can apply to.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(CompanyData::all());
        return view('jobs/index', []);
    }
}
