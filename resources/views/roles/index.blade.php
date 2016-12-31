@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="accordion" class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Jobs!
                </div>

                <form method="GET">
                  Company:<br>
                  <input type="text" name="company_name"><br>
                  Title:<br>
                  <input type="text" name="title"><br>
                  Description:<br>
                  <input type="text" name="description"><br>
                  Start Date:<br>
                  <input type="text" name="start_date"/><br>
                  End Date:<br>
                  <input type="text" name="end_date"/><br>
                  Salary:<br>
                  <select name="salary">
                    <option value="">{{"N/A"}}</option>
                    <option value="20000">{{"Less than 20,000"}}</option>
                    <option value="40000">{{"More than 20,000 and less than 40,000"}}</option>
                    <option value="60000">{{"More than 40,000 and less than 60,000"}}</option>
                    <option value="80000">{{"More than 60,000 and less than 80,000"}}</option>
                    <option value="10000">{{"More than 80,000 and less than 100,000"}}</option>
                    <option value="12000">{{"More than 100,000"}}</option>
                  </select><br><br>
                  Skills:<br>
                  <input type="text" name="skills"><br>
                  Qualfications:<br>
                  <input type="text" name="qualifications"><br>
                  <input type="submit" value="Submit"><br>


                </form>

                <table>
                  <tr>
                    <td>Company</td>
                    <td>Role</td>
                    <td>Timeframe</td>
                    <td>Salary</td>
                    <td>Qualifications</td>
                    <td>Apply</td>
                  </tr>
                    @foreach($roles as $role)
                      <tr>
                          <td>{{$role->company()->firstOrFail()->name}}</td>
                          <td><a href="/roles/{{$role->id}}/show">{{$role->title}}</a></td>
                          <td>{{"Start Date: " . $role->startDate() . ", End Date: " . $role->endDate()}}</td>
                          <td>{{"Salary: " . $role->salary}}</td>
                          <td>{{$role->qualifications}}</td>
                          <td><a href="/applications/{{$role->id}}/create">Apply</a></td>
                      </tr>
                    @endforeach
                </table>
                {{$roles->render()}}
            </div>
        </div>
    </div>
</div>
@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
