@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Unfortunately, you have been rejected for the following role:</div>

                <div class="panel-body">
                    {{"Title: " . $notification->data['role']['title']}}
                </div>

                <div class="panel-body">
                    {{"Company: " . $notification->data['role']['company_name']}}
                </div>

                <div class="panel-body">
                    <a href="/applications/{{$notification->data['id']}}/show">View Application</a>
                </div>

                <div class="panel-body">
                    <a href="{{URL::previous()}}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
