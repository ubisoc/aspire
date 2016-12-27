@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Profile!
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Name</div>

                <div class="panel-body">
                    {{$user->first_name . " " . $user->last_name}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Email</div>

                <div class="panel-body">
                    {{$user->email}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Number</div>

                <div class="panel-body">
                    {{$user->mobile_number}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">University ID</div>

                <div class="panel-body">
                    {{$data->university_id}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Biography</div>

                <div class="panel-body">
                    {{$data->biography}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Location Preference</div>

                <div class="panel-body">
                    {{$data->location_pref}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Role Preference</div>

                <div class="panel-body">
                    {{$data->job_pref}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">CV/Resume</div>

                <div class="panel-body">
                    {{$data->cv_name}}
                </div>

                <form method="GET" action="download">
                  {{csrf_field()}}
                  <div class="panel-body">
                      <button name="cv" type="submit">Download CV</button>
                  </div>
                </form>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Cover Letter</div>

                <div class="panel-body">
                    {{$data->cover_letter_name}}
                </div>

                <form method="GET" action="download">
                  {{csrf_field()}}
                  <div class="panel-body">
                      <button name="cover_letter" type="submit">Download Cover Letter</button>
                  </div>
                </form>
            </div>

            <a href="/profile/edit">Edit</a>
        </div>
    </div>
</div>
@endsection
