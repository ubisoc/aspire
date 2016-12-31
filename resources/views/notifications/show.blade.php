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

                @include('notifications.' . snake_case(class_basename($notification->type)) )
            </div>
        </div>
    </div>
</div>
@endsection
