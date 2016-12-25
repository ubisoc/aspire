<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
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
     * Show the profile of this student.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Retrieve the user and access the account.
        $user = \Auth::user();
        $account = $user->account()->firstOrFail();

        // If the account is a company, retrieve the company data,
        // If the account is a student, retrieve the student data.
        if ($account->type() == 'b') {
          $data = $account->companyData()->firstOrFail();
        }
        else {
          $data = $account->studentData()->firstOrFail();
        }

        return view('profile/index', ['user' => $user, 'data' => $data]);
    }

    /**
     * Edit the profile of this student.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // Retrieve the user and access the account.
        $user = \Auth::user();
        $account = $user->account()->firstOrFail();

        // If the account is a company, retrieve the company data,
        // If the account is a student, retrieve the student data.
        if ($account->type() == 'b') {
          $data = $account->companyData()->firstOrFail();
        }
        else {
          $data = $account->studentData()->firstOrFail();
        }

        if($request->method == "POST") {
          $user->setFirstName($request->get('first_name'));
          $user->setLastName($request->get('last_name'));
          $user->setEmail($request->get('email'));
          $user->setNumber($request->get('mobile_number'));
          
          $data->setUniversityId($request->get('university_id'));
          $data->setBiography($request->get('biography'));
          $data->setLocationPref($request->get('location_pref'));
          $data->setJobPref($request->get('job_pref'));

          return view('profile/index', ['user' => $user, 'data' => $data]);
        }

        return view('profile/edit', ['user' => $user, 'data' => $data]);
    }

    /**
     * Edit the profile of this student.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        return view('profile/edit');
    }
}
