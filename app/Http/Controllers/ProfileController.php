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

        if($request->isMethod('post')) {

          // Validate form fields.
          $this->validate($request, [
              'first_name' => 'required|max:255',
              'last_name' => 'required|max:255',
              'email' => 'required|email|max:255',
              'mobile_number' => 'required|numeric',
              'university_id' => 'required|numeric',
              'biography' => 'required',
              'location_pref' => 'required',
              'job_pref' => 'requied|max:255',
          ]);

          // Save the data to the database
          $user->setFirstName($request->get('first_name'));
          $user->setLastName($request->get('last_name'));
          $user->setEmail($request->get('email'));
          $user->setNumber($request->get('mobile_number'));

          $user->save();

          $data->setUniversityId($request->get('university_id'));
          $data->setBiography($request->get('biography'));
          $data->setLocationPref($request->get('location_pref'));
          $data->setJobPref($request->get('job_pref'));

          $data->save();

          return \Redirect::to('profile/index');
        }

        return view('profile/edit', ['user' => $user, 'data' => $data]);
    }

    /**
     * Upload the CV or Cover Letter of the student.
     *
     * @return
     */
    public function upload(Request $request)
    {
        // Get the file type and check if a file was uploaded.
        if(array_key_exists('cv',$request->all())) {
          $fileType = 'cv';
        }
        else {
          $fileType = 'cover_letter';
        }

        // Validate form fields.
        $this->validate($request, [
            $fileType => 'required|file',
        ]);

        // Retrieve the uploaded file.
        $file = request()->file($fileType);
        $fileName = $file->getClientOriginalName();

        // Get the extension of the file.
        $extension = $file->extension();

        // Retrieve the User ID.
        $user = \Auth::user();
        $userId = $user->id;

        $account = $user->account()->firstOrFail();

        // If the account is a company, retrieve the company data,
        // If the account is a student, retrieve the student data.
        if ($account->type() == 'b') {
          $data = $account->companyData()->firstOrFail();
        }
        else {
          $data = $account->studentData()->firstOrFail();
          if ($fileType == 'cv') {
            $data->setCVName($fileName);
          }
          else {
            $data->setCoverLetterName($fileName);
          }
          $data->save();
        }

        // Store the file onto the local disk.
        $file->storeAs($userId . '/', $fileName);

        return back();
    }

    /**
     * Download either the CV or the Cover Letter of the student.
     *
     * @return
     */
    public function download(Request $request)
    {
        // Retrieve the User ID.
        $user = \Auth::user();
        $userId = $user->id;

        // Get the file type.
        if(array_key_exists('cv',$request->all())) {
          $fileType = 'cv';
        }
        else {
          $fileType = 'cover_letter';
        }

        $account = $user->account()->first();

        // If the account is a company, retrieve the company data,
        // If the account is a student, retrieve the student data.
        if ($account->type() == 'b') {
          $data = $account->companyData()->firstOrFail();
        }
        else {
          $data = $account->studentData()->firstOrFail();
          if ($fileType == 'cv') {
            $fileName = $data->cvName();
          }
          else {
            $fileName = $data->coverLetterName();
          }
        }

        return response()->download(public_path() . '/storage/app/' . $userId . '/' . $fileName);
    }
}
