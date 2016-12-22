@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
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
                  <input type="text" name="start_date"><br>
                  End Date:<br>
                  <input type="text" name="end_date"><br>
                  Salary:<br>
                  <input type="text" name="salary"><br>
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
                    <td>Description</td>
                    <td>Timeframe</td>
                    <td>Salary</td>
                    <td>Skills</td>
                    <td>Qualifications</td>
                    <td>Apply</td>
                  </tr>
                    @foreach($roles as $role)
                      <tr>
                          <td>{{$role->company()->first()->name}}</td>
                          <td>{{$role->title}}</td>
                          <td>{{$role->description}}</td>
                          <td>{{"Start Date: " . $role->startDate() . ", End Date: " . $role->endDate()}}</td>
                          <td>{{"Salary: " . $role->salary}}</td>
                          <td>{{$role->skills}}</td>
                          <td>{{$role->qualifications}}</td>
                          <td>Apply</td>
                      </tr>
                    @endforeach
                </table>
                {{$roles->render()}}
            </div>
        </div>
    </div>
</div>
@endsection
