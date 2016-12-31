@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Role Title</div>

                <div class="panel body">
                  {{$role->title}}
                </div>
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

            <form method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div>
                <br>{{"CV/Resume"}}</br>
                <br>
                  <input type="file" name="cv"></input>
                </br>
                <br>{{"Cover Letter"}}</br>
                <br>
                  <input type="file" name="cover_letter"></input>
                </br>
                <button name="uploaded" type="submit">Submit Application</button>
              </div>
            </form>

            <a href="{{URL::previous()}}">Back</a>
        </div>
    </div>
</div>
@endsection
