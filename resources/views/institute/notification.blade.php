@extends('layouts.institute_dashboard')
@section('css')
<style type="text/css">
#deceased{
    background-color:#FFF3F5;
  padding-top:10px;
  margin-bottom:10px;
}
.remove_field{
  float:right;  
  cursor:pointer;
  position : absolute;
}
.remove_field:hover{
  text-decoration:none;
}
</style>
@endsection
@section('content')
<div class="row">
<div class="col-lg-12"><br>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if(count($errors)>0)
                <div style="margin-top:20px;">
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
                @endforeach
                    </ul>
                </div>
                </div>
                 @endif
               
            </div>
</div>
<div class="card" style="margin:20px;">
    <div class="card-header">
            <h3 class="card-title">Notification Panel</h3>
    </div>
<div class="card-block">
<form action="{{route('addNotification')}}" method="post">
  @csrf
<div class="col-md-12 col-sm-12">
    <div class="row" style="margin-top:15px;">
    <div class="form-group col-md-12 col-sm-12">
            <label for="name">Title</label>
            <input type="text" class="form-control input-sm" id="Title" name="title" required="" placeholder="Enter Title">
        </div>
        <div class="form-group col-md-12 col-sm-12">
            <label for="reg-no">Description</label>
            <textarea class="form-control input-sm" id="Description" name="description" rows="3" required="" placeholder="Enter Description"></textarea>
        </div>
</div>
<button type="submit" class="btn btn-primary d-block mx-auto">Notify</button>
</form>
</div>
@endsection