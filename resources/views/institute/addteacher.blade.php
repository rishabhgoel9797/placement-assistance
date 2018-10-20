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
<div class="panel panel-primary" style="margin:20px;">
    <div class="panel-heading">
            <h3 class="panel-title">Teacher Registration</h3>
    </div>
<div class="panel-body">
    <form>
<div class="col-md-12 col-sm-12">
    <div class="form-group col-md-6 col-sm-6">
            <label for="name">Name </label>
            <input type="text" class="form-control input-sm" id="Name" required="" placeholder="Enter Name">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="reg-no">Registration No</label>
            <input type="text" class="form-control input-sm" id="Reg-no" required="" placeholder="Enter Registartion number">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="Program">Program</label>
           <select class="form-control">
             <option>Select Program</option>
             <option value=""></option>
             <option value=""></option>
             <option value=""></option>
             
            </select>
       </div>

    <div class="form-group col-md-6 col-sm-6">
          <label for="Department">Department</label>
          <select class="form-control">
                        <option>Select</option>
                        <option>Civil Engineering</option>
                        <option>Mechanical Enginnering</option>
                        <option>Automobile Engineering</option>
                        <option>Aerospace Engineering</option>
                        <option>Mechatronics</option>
                        <option>Electronics And Communication</option>
                        <option>Electrical And Electronics</option>
                        <option>Electronics And Instrumentation</option>
                        <option>Computer Science Engineering</option>
                        <option>Information Technology</option>
                        <option>Software Engineering</option>
                        <option>Chemical Engineering</option>
                        <option>Biotechnology</option>
                        <option>Genetic Engineering</option>
                        <option>Biomedical Engineering</option>
                        <option>Food Process Engineering</option>
                        <option>Nanotechnology</option>
                    </select>
       </div>
    
           
    <div class="form-group">
        <div class="row">
    <div class="col-sm-2 col-sm-offset-5" >
            <input type="submit" class="btn btn-block" tabindex="3" value="Add Teacher"/>
    </div>
</div>
</div>
</div>
</form>
</div>
@endsection