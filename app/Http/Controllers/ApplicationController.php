<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Role;
use App\User;
use App\Notifications\ApplicationSent;
use Illuminate\Support\Facades\Auth;

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
   * Return a list of all the applications a Student has made.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      $user = Auth::user();
      $account = $user->account()->firstOrFail();
      $data = $account->studentData()->firstOrFail();
      $applications = $data->applications()->paginate(5);

      return view('applications/index', ['applications' => $applications]);
  }

  /**
   * Show an application a student has submitted.
   *
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, $applicationId)
  {
      $user = Auth::user();
      $account = $user->account()->firstOrFail();
      $data = $account->studentData()->firstOrFail();
      $application = Application::where('id', '=', $applicationId)->firstOrFail();

      $role = $application->role()->firstOrFail();

      return view('applications/show', ['application' => $application, 'role' => $role, 'user' => $user, 'data' => $data]);
  }

  /**
   * Create an application.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request, $roleId)
  {
      $user = Auth::user();
      $userId = $user->id;
      $account = $user->account()->firstOrFail();
      $data = $account->studentData()->firstOrFail();

      $role = Role::where('id', '=', $roleId)->firstOrFail();

      if($request->isMethod('post')) {
        $application = new Application();
        $application->student()->associate($data);
        $application->role()->associate($role);

        // Validate form fields.
        $this->validate($request, [
            'cv' => 'required|file',
            'cover_letter' => 'required|file',
        ]);

        // Retrieve the the CV and Cover Letter.
        $cv = request()->file('cv');
        $cvName = $cv->getClientOriginalName();

        $coverLetter = request()->file('cover_letter');
        $coverLetterName = $coverLetter->getClientOriginalName();

        $application->save();
        $applicationId = $application->id;

        $cvPath = $userId . '/applications/' . $applicationId . '/cv/' . $cvName;
        $coverLetterPath = $userId . '/applications/' . $applicationId . '/cover_letter/' . $coverLetterName;

        $application->setCVName($cvPath);
        $application->setCoverLetterName($coverLetterPath);
        $application->save();

        // Store the CV and Cover Letter onto the local disk.
        $cv->storeAs($userId . '/applications/' . $applicationId . '/cv/', $cvName);
        $coverLetter->storeAs($userId . '/applications/' . $applicationId . '/cover_letter/', $coverLetterName);

        $user->notify(new ApplicationSent($application));

        return redirect()->action('ApplicationController@index');
      }

      return view('applications/create', ['user' => $user, 'data' => $data, 'role' => $role]);
  }

  /**
   * Delete an application a student has submitted.
   *
   * @return \Illuminate\Http\Response
   */
  public function delete(Request $request, $applicationId)
  {
      $user = Auth::user();
      $application = $user->applications()->where('id', '=', $applicationId)->firstOrFail();

      $cvPath = $userId . '/applications/' . $applicationId . '/cv';
      $coverLetterPath = $userId . '/applications/' . $applicationId . '/cover_letter';

      // Delete all existing CVs or Cover Letters for that application
      $success = \File::cleanDirectory('storage/app/' . $cvPath);
      $success = \File::cleanDirectory('storage/app/' . $coverLetterPath);

      $application->delete();

      return redirect()->action('ApplicationController@index');
  }

  /**
   * Download the CV or Cover Letter of an application a student has submitted.
   *
   * @return \Illuminate\Http\Response
   */
  public function download(Request $request, $applicationId, $fileType)
  {
      // Retrieve the User ID.
      $user = \Auth::user();
      $userId = $user->id;

      $account = $user->account()->first();
      $data = $account->studentData()->firstOrFail();
      $application = $data->applications()->where('id', '=', $applicationId)->firstOrFail();

      // Get the file type.
      if($fileType == 'cv') {
        $filePath = $application->cvName();
      }
      else {
        $filePath = $application->coverLetterName();
      }

      if ($filePath == null) {
        return back();
      }

      return response()->download(public_path() . '/storage/app/' . $filePath);
  }
}
