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
<!-- <!doctype html>
<html><head></head><body> -->

<div class="card" style="margin:20px;">
    <div class="card-header">
    <h3 class="card-title">Company Registration</h3>
    </div>
<div class="card-block">
    <form>
<div class="col-md-12 col-sm-12">
    <div class="row" style="margin-top:15px;">
    <div class="form-group col-md-6 col-sm-6">
            <label for="Companyname">Company Name</label>
            <input type="text" class="form-control input-sm" id="Company-Name" required="" placeholder="Enter Company Name">
        </div>
        <div class="form-group col-md-6">
            <label for="JobRole">Job Role</label>
            <input type="text" class="form-control input-sm" id="Job-Role" required="" placeholder="Enter Job Role">
        </div>
    </div>
<div class="row">
        <div class="form-group col-md-6">
            <label for="CompanyDescription">Company Description</label>
           <textarea class="form-control input-sm" id="Company-Description" rows="3" required="" placeholder="Enter Company Description"></textarea>
       </div>

    <div class="form-group col-md-6 col-sm-6">
          <label for="address">Job Description</label>
          <textarea class="form-control input-sm" id="Job-Description" rows="3" required="" placeholder="Enter Job Description"></textarea>
       </div>
   </div>
  <div class="row">  
    <div class="form-group col-md-6 col-sm-6">
            <label for="Location">Location</label>
            <input type="text" class="form-control input-sm" id="Location" required="" placeholder="Enter Location">
        </div>
        
    
    <div class="form-group col-md-6 col-sm-6">
            <label for="CTC">CTC</label>
            <input type="text" class="form-control input-sm" id="CTC" required="" placeholder="Enter CTC">
        </div>
</div>
<div class="row">

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
        <label>Eligibility Criteria</label>
</div>
   <div class="form-group col-md-4 col-sm-4">
            <label for="class-X">(Class X<sup>th</sup>)</label>
             <br>
            <select class="form-control">
                <option>Select</option>
             <option value=">>=60%">&gt;=60%</option>
             <option value=">70%">&gt;70%</option>
             <option value=">80%">&gt;80%</option>
             <option value=">85%">&gt;85%</option>
             
            </select>
        </div>
        <br>
        <div class="form-group col-md-4 col-sm-4">
            <label for="calss-XII">(Class XII<sup>th</sup>)</label>
             <br>
            <select class="form-control">
                <option>Select</option>
            <option value=">>=60%">&gt;=60%</option>
             <option value=">70%">&gt;70%</option>
             <option value=">80%">&gt;80%</option>
             <option value=">85%">&gt;85%</option>
             
            </select>
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="ug/diploma">(UG/Diploma)</label>
             <br>
            <select class="form-control">
                <option>Select</option>
             <option value=">>=60%">&gt;=60%</option>
             <option value=">70%">&gt;70%</option>
             <option value=">80%">&gt;80%</option>
             <option value=">85%">&gt;85%</option>
             
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-sm-10">

          <label for="course_duration">Hiring Rounds</label>
                                        
           <input type="number" name="course_duration" id="course_duration" class="form-control" placeholder="No.of rounds" required/>
            <p class="help-block">Eg: 3 or 4 rounds</p>
             </div>  

            <div class="col-md-2 col-sm-2">
            <button type="button" class="btn btn-primary" onclick="add_sub_courses();" style="margin-top:31px;">Add Rounds</button>
              </div>
                                   
            </div>
                             <div id="subcourse"></div>
        <div class="row">
        <div class="form-group col-md-12 col-sm-12">
        <label>Select Company logo </label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">

      </div>
  </div>
  </div>
            <button type="submit" class="btn btn-primary d-block mx-auto">Add Company</button>

</div>
</form>
</div>
</div>
</body>
@endsection
@section('script')
<script>
        var cultivate = 1;
        function add_sub_courses() {
            var duration=document.getElementById("course_duration").value;
            var objTo = document.getElementById('subcourse');
            objTo.innerHTML="";
            
         for(var i=0;i<duration;i++)
         {
            var objTo = document.getElementById('subcourse')
            var divtest = document.createElement("div");
            divtest.innerHTML = ' <div class="row"><div class="col-sm-6"><label for="subCourse_week">Round Number</label><div class="form-group"><input type="text" name="subCourse_week[]"  class="form-control round-input" placeholder="Subcourse Week No." required/></div></div><div class="col-sm-6"><label for="subCourse_title">Round Title</label><div class="form-group"><select class="form-control"><option>Select</option><option value="Online Test">Online Test</option><option value="Pre-Placement Talk">Pre-Placement Talk</option><option value="Group Discussion">Group Discussion</option><option value="Technical Interview">Technical Interview</option><option value="HR Interview">HR Interview</option></select></div></div></div>';
            objTo.appendChild(divtest);

           
            
         }
         var rounds=document.getElementsByClassName('round-input');
         for(var i=0;i<rounds.length;i++)
         {
             rounds[i].value="Round "+(i+1);
         }
        
        }
 </script>
 @endsection