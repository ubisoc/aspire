@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" target="/profile/edit">
              <input name="_token" type="hidden" value={{csrf_token()}}></input>
              <div>
                <br>{{"First Name"}}</br>
                <br><input value = {{$user->first_name != null ? $user->first_name : ''}} name="name" type="text"></input></br>
              </div>
              <div>
                <br>{{"Last Name"}}</br>
                <br><input value = {{$user->last_name != null ? $user->last_name : ''}} name="name" type="text"></input></br>
              </div>
              <div>
                <br>{{"Email"}}</br>
                <br><input value = {{$user->email != null ? $user->email : ''}} name="email" type="text"></input></br>
              </div>
              <div>
                <br>{{"Number"}}</br>
                <br><input value = {{$user->mobile_number != null ? $user->mobile_number : ''}} name="mobile_number" type="text"></input></br>
              </div>
              <div>
                <br>{{"University ID"}}</br>
                <br><input value = {{$data->university_id != null ? $data->university_id : ''}} name="university_id" type="text"></input></br>
              </div>
              <div>
                <br>{{"Biography"}}</br>
                <br><input value = {{$data->biography != null ? $data->biography : ''}} name="biography" type="text"></input></br>
              </div>
              <div>
                <br>{{"Location Preference"}}</br>
                <br><input value = {{$data->location_pref != null ? $data->location_pref : ''}} name="location_pref" type="text"></input></br>
              </div>
              <div>
                <br>{{"Role Preference"}}</br>
                <br><input value = {{$data->job_pref != null ? $data->job_pref : ''}} type="text" name="text"></input></br>
              </div>

              <button type="submit" name="submit">Submit</button>
            </form>

            <a href="/profile/index">Back</a>
        </div>
    </div>
</div>
@endsection
