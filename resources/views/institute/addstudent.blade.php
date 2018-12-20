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
            <h3 class="card-title">Student Registration</h3>
    </div>
<div class="card-block">
<form action="{{route('addStudent')}}" method="post">
    @csrf
<div class="col-md-12 col-sm-12">
    <div class="row" style="margin-top:15px;">
    <div class="form-group col-md-4 col-sm-4">
            <label for="name">Name </label>
            <input class="form-control input-sm">
        </div>
        <div class="form-group col-md-4 col-sm-4">
                <label for="email">Email</label>
                <input type="email" class="form-control input-sm">
            </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="unique_id">Registration No</label>
            <input type="text" class="form-control input-sm">
        </div>
</div>
<div class="row">
        <div class="form-group col-md-6 col-sm-6">
            <label for="Program">Program</label>
           <select class="form-control" name="program">
             <option>Select</option>
             <option value="B.Tech">B.Tech</option>
             <option value="M.Tech">M.Tech</option>
             <option value="MBA">MBA</option>
             
            </select>
       </div>

    <div class="form-group col-md-6 col-sm-6">
          <label for="Department">Department</label>
          <select class="form-control" name="department">
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
    </div>
    <div class="row">
    <div class="form-group col-md-6 col-sm-6">
            <label for="Year">Year</label>
            <select class="form-control" name="year">
             <option>Select</option>
             <option value="3">3</option>
             <option value="4">4</option>
             
             
            </select>
        </div>
        
    
    <div class="form-group col-md-6 col-sm-6">
            <label for="Teacher">Teacher</label>
             <select class="form-control" name="select_teacher">
                    <option value="">--Select Teacher to mentor student--</option>
             @if(count($teachers)>0)
                @foreach($teachers as $t)
             <option value="{{$t->teacher_id}}">{{$t->name}}</option>
                @endforeach
             @endif
             </select>
        </div>
</div>
      <button type="submit" class="btn btn-primary d-block mx-auto">Add Student</button>
</div>
</form>
</div>
@endsection