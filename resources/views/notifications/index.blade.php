@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Notifications!
                </div>
            </div>

            <table>
              <tr>
                <td>ID</td>
                <td>Type</td>
                <td>Notifiable ID</td>
                <td>Notifiable Type</td>
                <td>Data</td>
                <td>Read At</td>
              </tr>
                @foreach($notifications as $notification)
                  <tr>
                      <td>{{$notification->id}}</td>
                      <td>{{$notification->type}}</td>
                      <td>{{$notification->notifiable_id}}</td>
                      <td>{{$notification->notifiable_type}}</td>
                      <td><a href="/notifications/{{$notification->id}}/show">View Notification</a></td>
                      <td>{{$notification->read_at}}</td>
                  </tr>
                @endforeach
            </table>
            {{$notifications->render()}}
        </div>
    </div>
</div>
@endsection
