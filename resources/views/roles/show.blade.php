@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Role</div>

              <div class="panel-body">
                  {{$role->title}}
              </div>
          </div>

          <div class="panel panel-default">
              <div class="panel-heading">Company</div>

              <div class="panel-body">
                  {{$company->name}}
              </div>
          </div>

          <div class="panel panel-default">
              <div class="panel-heading">Description</div>

              <div class="panel-body">
                  {{$role->description}}
              </div>
          </div>

          <div class="panel panel-default">
              <div class="panel-heading">Timeframe</div>

              <div class="panel-body">
                  {{"Start Date: " . $role->startDate() . ", End Date: " . $role->endDate()}}
              </div>
          </div>

          <div class="panel panel-default">
              <div class="panel-heading">Salary</div>

              <div class="panel-body">
                  {{$role->salary}}
              </div>
          </div>

          <div class="panel panel-default">
              <div class="panel-heading">Skills</div>

              <div class="panel-body">
                  {{$role->skills}}
              </div>
          </div>

          <div class="panel panel-default">
              <div class="panel-heading">Qualifications</div>

              <div class="panel-body">
                  {{$role->qualifications}}
              </div>
          </div>

          <div class="panel panel-default">
              <div class="panel-heading">Apply</div>

              <div class="panel-body">
                  <a href="/applications/{{$role->id}}/create">Apply</a>
              </div>
          </div>

          <a href="{{URL::previous()}}">Back</a>
      </div>
    </div>
</div>
@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
