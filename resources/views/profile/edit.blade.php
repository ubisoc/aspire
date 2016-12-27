@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST">
              {{csrf_field()}}
              <div>
                <br>{{"First Name"}}</br>
                <br><input value = {{$user->first_name != null ? $user->first_name : ''}} name="first_name" type="text"></input></br>
              </div>
              <div>
                <br>{{"Last Name"}}</br>
                <br><input value = {{$user->last_name != null ? $user->last_name : ''}} name="last_name" type="text"></input></br>
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
                <br><input value = {{$data->biography != null ? $data->biography : ''}} name="biography" type="textarea"></input></br>
              </div>
              <div>
                <br>{{"Location Preference"}}</br>
                <br><input value = {{$data->location_pref != null ? $data->location_pref : ''}} name="location_pref" type="text"></input></br>
              </div>
              <div>
                <br>{{"Role Preference"}}</br>
                <br><input value = {{$data->job_pref != null ? $data->job_pref : ''}} type="text" name="job_pref"></input></br>
              </div>

              <button type="submit" name="submit">Submit</button>
            </form>

            <form method="POST" action="/profile/upload" enctype="multipart/form-data">
              {{csrf_field()}}
              <div>
                <br>{{"CV/Resume: " . $data->cv_name}}</br>
                <br>
                  <input type="file" name="cv"></input>
                  <button name="uploaded" type="submit">Save CV/Resume</button>
                  <button name="cv" type="submit" value="deleted">Delete CV/Resume</button>
                </br>
              </div>
            </form>
            <form method="POST" action="/profile/upload" enctype="multipart/form-data">
              {{csrf_field()}}
              <div>
                <br>{{"Cover Letter: " . $data->cover_letter_name}}</br>
                <br>
                  <input type="file" name="cover_letter"></input>
                  <button type="submit">Save Cover Letter</button>
                  <button name="cover_letter" type="submit" value="deleted">Delete Cover Letter</button>
                </br>
              </div>
            </form>

            <a href="/profile/index">Back</a>
        </div>
    </div>
</div>
@endsection
