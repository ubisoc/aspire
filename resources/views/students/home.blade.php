@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <table>
      <tr>
        <td><a href="/roles/index">Job/Internship Opportunities</a></td>
        <td><a href="/profile/index">Profile</a></td>
        <td><a href="/applications/index">Applications</a></td>
      </tr>
      <tr>
        <td><a href="/messages">Messages</a></td>
        <td><a href="/notifications/index">Notifications</a></td>
        <td><a href="/settings">Settings</a></td>
      </tr>
    </table>
</div>
@endsection
