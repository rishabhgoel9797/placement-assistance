@extends('layouts.teacher_dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/uploads/avatars/teachers/{{$user->avatar}}" style="width:150px; height: 150px; float: left; margin-right: 30px;border-radius: 50%" onerror=this.src="{{asset('uploads/avatars/teachers/download.png')}}">
            <h2 >{{$user->name}}'s Profile</h2>
            <form enctype="multipart/form-data" action="{{route('teacherprofile')}}" method="post">
                @csrf
                <label>Update Profile image</label>
                <input type="file" name="avatar" required="yes">
                <input type="submit" class="btn  btn-sm btn-primary center-block">
            </form>
        </div>
    </div>
</div>
@endsection