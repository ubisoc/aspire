@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Applications!
                </div>

                <table>
                  <tr>
                    <td>Company</td>
                    <td>Role</td>
                    <td>CV</td>
                    <td>Cover Letter</td>
                    <td>View Application</td>
                  </tr>
                    @foreach($applications as $application)
                      <tr>
                          <td>{{$application->role()->first()->company_name}}</td>
                          <td>{{$application->role()->first()->title}}</td>
                          <td><a href="/applications/download/{{$application->id}}/cv">{{\Helper::retrieveNameFromFilePath($application->cv_name)}}</a></td>
                          <td><a href="/applications/download/{{$application->id}}/coverLetter">{{\Helper::retrieveNameFromFilePath($application->cover_letter_name)}}</a></td>
                          <td><a href="/applications/{{$application->id}}/show">View Application</a></td>
                      </tr>
                    @endforeach
                </table>
                {{$applications->render()}}
            </div>
        </div>
    </div>
</div>
@endsection
