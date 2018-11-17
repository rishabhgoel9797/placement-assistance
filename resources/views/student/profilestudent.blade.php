@extends('layouts.student_dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/students/{{$user->avatar}}" style="width:150px; height: 150px; float: left; border-radius: 50%">
            <h2>{{$user->name}}'s Profile</h2>
            <form enctype="multipart/form-data" action="{{route('studentprofile')}}" method="post">
                @csrf
                <label>Update Profile image</label>
                <input type="file" name="avatar" required="yes">
                <input type="submit" class="pull-right btn  btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection