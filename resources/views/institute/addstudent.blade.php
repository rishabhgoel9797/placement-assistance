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
<div class="panel panel-primary" style="margin:20px;">
    <div class="panel-heading">
            <h3 class="panel-title">Student Registration</h3>
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
            <input type="text" class="form-control input-sm" id="Reg-no" required="" placeholder="Enter Registration number">
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
    
    <div class="form-group col-md-6 col-sm-6">
            <label for="Year">Year</label>
            <select class="form-control">
             <option>Select Program</option>
             <option value="3">3</option>
             <option value="4">4</option>
             
             
            </select>
        </div>
        
    
    <div class="form-group col-md-6 col-sm-6">
            <label for="Teacher">Teacher</label>
             <select class="form-control">
             <option>Select Teacher</option>
             <option value=""></option>
             <option value=""></option>
             </select>
        </div>


   
    <div class="form-group">
        <div class="row">
    <div class="col-sm-2 col-sm-offset-5" >
            <input type="submit" class="btn btn-block" tabindex="3" value="Add Student"/>
    </div>
</div>
</div>
</div>
</form>
</div>
@endsection