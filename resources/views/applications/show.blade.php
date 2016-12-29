@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Application {{" ID: " . $application->id}}</div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Company</div>

                <div class="panel body">
                  {{$role->company_name}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Description</div>

                <div class="panel body">
                  {{$role->description}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Start and End Date</div>

                <div class="panel body">
                  {{"Start Date: " . $role->start_date . "\n" . "End Date: " . $role->end_date}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Salary</div>

                <div class="panel body">
                  {{$role->salary}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Skills</div>

                <div class="panel body">
                  {{$role->skills}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Qualifications</div>

                <div class="panel body">
                  {{$role->qualifications}}
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Name</div>

                <div class="panel body">
                  {{$user->first_name . " " . $user->last_name}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Mobile Number</div>

                <div class="panel body">
                  {{$user->mobile_number}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Email</div>

                <div class="panel body">
                  {{$user->email}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">University ID</div>

                <div class="panel body">
                  {{$data->university_id}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Biography</div>

                <div class="panel body">
                  {{$data->biography}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Location Preference</div>

                <div class="panel body">
                  {{$data->location_pref}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Job Preference</div>

                <div class="panel body">
                  {{$data->job_pref}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">CV/Resume</div>

                <div class="panel body">
                  <a href="/applications/download/{{$application->id}}/cv">{{\Helper::retrieveNameFromFilePath($application->cv_name)}}</a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Cover Letter</div>

                <div class="panel body">
                  <a href="/applications/download/{{$application->id}}/coverLetter">{{\Helper::retrieveNameFromFilePath($application->cover_letter_name)}}</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Withdraw Application</div>

                <div class="panel body">
                  <a href="/applications/{{$application->id}}/delete">Withdraw Application</a>
                </div>
            </div>
        </div>
        <a href="/applications/index">Back</a>
    </div>
</div>
@endsection
