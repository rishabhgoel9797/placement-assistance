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
<body>
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
<div class="panel panel-primary" style="margin:20px;">
    <div class="panel-heading">
            <h3 class="panel-title">Teacher Registration</h3>
    </div>
<div class="panel-body">
<form method="post" action="{{route('addTeacherPost')}}">
        @csrf
<div class="col-md-12 col-sm-12">
    <div class="form-group col-md-4 col-sm-4">
            <label for="name">Name </label>
            <input type="text" class="form-control input-sm" name="name" id="Name" required="" value="{{ old('name') }}" placeholder="Enter Name">
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="email">Email</label>
            <input type="text" class="form-control input-sm" name="email" id="email" required="" value="{{ old('email') }}" placeholder="Enter Email Id">
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="unique_id">Registration No</label>
            <input type="text" class="form-control input-sm" name="unique_id" id="unique_id" value="{{ old('unique_id') }}" required="" placeholder="Enter Registartion number">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="Program">Program</label>
           <select class="form-control" name="program" required value="{{ old('program') }}">
             <option value="">Select Program</option>
             <option value="B.Tech">B.Tech</option>
             <option value="M.Tech">M.Tech</option>
             <option value="MBA">MBA</option>
             
            </select>
       </div>

    <div class="form-group col-md-6 col-sm-6">
          <label for="department">Department</label>
          <select class="form-control" name="department" required value="{{ old('department') }}">
                        <option value="">Select</option>
                        <option value="Civil Engineering">Civil Engineering</option>
                        <option value="Mechanical Enginnering">Mechanical Enginnering</option>
                        <option value="Automobile Engineering">Automobile Engineering</option>
                        <option value="Aerospace Engineering">Aerospace Engineering</option>
                        <option value="Mechatronics">Mechatronics</option>
                        <option value="Electronics And Communication">Electronics And Communication</option>
                        <option value="Electrical And Electronics">Electrical And Electronics</option>
                        <option value="Electronics And Instrumentation">Electronics And Instrumentation</option>
                        <option value="Computer Science Engineering">Computer Science Engineering</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Software Engineering">Software Engineering</option>
                        <option value="Chemical Engineering">Chemical Engineering</option>
                        <option value="Biotechnology">Biotechnology</option>
                        <option value="Genetic Engineering">Genetic Engineering</option>
                        <option value="Biomedical Engineering">Biomedical Engineering</option>
                        <option value="Food Process Engineering">Food Process Engineering</option>
                        <option value="Nanotechnology">Nanotechnology</option>
                    </select>
       </div>
    
           
    <div class="form-group">
        <div class="row">
    <div class="col-sm-2 col-sm-offset-5" >
            <input type="submit" class="btn btn-primary btn-block" tabindex="3" value="Add Teacher"/>
    </div>
</div>
</div>
</div>
</form>
</div>
@endsection