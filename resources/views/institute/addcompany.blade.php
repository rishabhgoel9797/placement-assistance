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
            <h3 class="panel-title">Registration Form</h3>
    </div>
<div class="panel-body">
    <form>
<div class="col-md-12 col-sm-12">
    <div class="form-group col-md-6 col-sm-6">
            <label for="Companyname">Company Name  </label>
            <input type="text" class="form-control input-sm" id="Company-Name" required="" placeholder="Enter Company Name">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="JobRole">Job Role</label>
            <input type="text" class="form-control input-sm" id="Job-Role" required="" placeholder="Enter Job Role">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="CompanyDescription">Company Description</label>
           <textarea class="form-control input-sm" id="Company-Description" rows="3" required="" placeholder="Enter Company Description"></textarea>
       </div>

    <div class="form-group col-md-6 col-sm-6">
          <label for="address">Job Description</label>
          <textarea class="form-control input-sm" id="Job-Description" rows="3" required="" placeholder="Enter Job Description"></textarea>
       </div>
    
    <div class="form-group col-md-6 col-sm-6">
            <label for="Location">Location</label>
            <input type="text" class="form-control input-sm" id="Location" required="" placeholder="Enter Location">
        </div>
        
    
    <div class="form-group col-md-6 col-sm-6">
            <label for="CTC">CTC</label>
            <input type="text" class="form-control input-sm" id="CTC" required="" placeholder="Enter CTC">
        </div>


    <div class="form-group col-md-12 col-sm-12">
            <label for="Category">Category</label>
            <br>
            <select class="form-control">
                <option>Select</option>
             <option value="Mass">Mass</option>
             <option value="Dream">Dream</option>
             <option value="SuperDream">Super-Dream</option>
             
            </select>
        </div>
        <div class="form-group col-md-12 col-sm-12">
        <label>Elegibility Criteria</label>


      </div>
      

    <div class="form-group col-md-4 col-sm-4">
            <label for="class-X">(Class X<sup>th</sup>)</label>
             <br>
            <select class="form-control">
                <option>Select</option>
             <option value=">>=60%">>=60%</option>
             <option value=">70%">>70%</option>
             <option value=">80%">>80%</option>
             <option value=">85%">>85%</option>
             
            </select>
        </div>
        <br>
        <div class="form-group col-md-4 col-sm-4">
            <label for="calss-XII">(Class XII<sup>th</sup>)</label>
             <br>
            <select class="form-control">
                <option>Select</option>
            <option value=">>=60%">>=60%</option>
             <option value=">70%">>70%</option>
             <option value=">80%">>80%</option>
             <option value=">85%">>85%</option>
             
            </select>
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="ug/diploma">(UG/Diploma)</label>
             <br>
            <select class="form-control">
                <option>Select</option>
             <option value=">>=60%">>=60%</option>
             <option value=">70%">>70%</option>
             <option value=">80%">>80%</option>
             <option value=">85%">>85%</option>
             
            </select>
        </div>

    <div class="form-group">
        <div class="row">
    <div class="col-sm-2 col-sm-offset-5" >
            <input type="submit" class="btn btn-block" tabindex="3" value="Register"/>
    </div>
</div>
</div>
</div>
</form>
</div>
@endsection