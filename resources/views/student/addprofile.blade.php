@extends('layouts.student_dashboard')

@section('css')
 <!-- <link href="{{asset('css/stepper.css')}}" rel="stylesheet"> -->
 <style type="text/css">
 	.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
   /* opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
a{
   color: black; 
}
 </style>
 <link href="{{asset("css/bootstrap-tagsinput.css")}}" rel="stylesheet">
@endsection
@section('content')

    <div class="stepwizard">
        <div class="stepwizard-row setup-card">
            <div class="row">
            <div class="stepwizard-step col-md-2 col-sm-2"> <a href="#step-1" type="button" class="btn btn-info btn-circle">1</a>
                <p><small>Basic Information</small>
                </p>
            </div>
            <div class="stepwizard-step col-md-2 col-sm-2"> <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                <p><small>Education Details</small>
                </p>
            </div>
            <div class="stepwizard-step col-md-2 col-sm-2"> <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Internship Projects</small>
                </p>
            </div>
            <div class="stepwizard-step col-md-2 col-sm-2"> <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Skills</small>
                </p>
            </div>
            <div class="stepwizard-step col-md-2 col-sm-2"> <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p><small>Extra-Curricular</small>
                </p>
            </div>
            <div class="stepwizard-step col-md-2 col-sm-2"> <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                <p><small>Certifications</small>
                </p>
            </div>
        </div>
        </div>
    </div>
    <form role="form" method="post" action="" id="needs-validation" novalidate>
    	@csrf
        <div class="card setup-content" id="step-1">
            <div class="card-header">
                 <h3 class="card-title">Basic Information</h3>
            </div>
            <div class="card-body">
            	<div class="row" style="margin-top:15px;">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                    <label class="col-form-label">Name</label>
                    <input maxlength="100" type="text"  name="name" required class="form-control"
                    placeholder="Enter Full Name">
                </div>
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Email</label>
                    <input maxlength="100" type="email" name="email" required class="form-control"
                    placeholder="Enter Email">
                </div>
                </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Registration Number</label>
                    <input maxlength="100" type="text" name="regno" required
                    class="form-control" placeholder="Enter Registration Number">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Date Of Birth</label>
                    <input type="date" name="dob" required class="form-control"
                    placeholder="Enter DOB">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Gender</label>
                    <br>
                    <select class="form-control" name="gender">
                        <option>Select</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Permanent Address</label>
                    <input maxlength="100" type="text" name="address" required class="form-control"
                    placeholder="Enter Address">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Contact</label>
                    <input maxlength="10" minlength="10" type="text" name="contact" required
                    class="form-control" placeholder="1234567890">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Alternate Contact</label>
                    <input maxlength="10" type="text" name="altcontact" class="form-control"
                    placeholder="1234567890">
                </div>
            </div>
                <button class="btn btn-primary nextBtn float-right" type="button">Next</button>
            </div>
        </div>
        <div class="card setup-content" id="step-2">
            <div class="card-header">
                 <h3 class="card-title">Educational Details</h3>
            </div>
            <div class="card-body">
            	
                <div>
                     <h3> Class 10<sup>th</sup></h3>
                </div>
                <div class="row" style="margin-top:15px;">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">School/Institution</label>
                    <input maxlength="200" type="text" required="required" name="school" 
                    class="form-control" placeholder="Enter School/Institution Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Board</label>
                    <select class="form-control" name="board">
                        <option value="">Select</option>
<option value="Andhra Pradesh Board of Secondary Education">Andhra Pradesh Board of Secondary Education</option>
<option value="Andhra Pradesh Board of Intermediate Education">Andhra Pradesh Board of Intermediate Education</option>
<option value="Andhra Pradesh Open School Society">Andhra Pradesh Open School Society</option>
<option value="Board of Higher Secondary Education Delhi">Board of Higher Secondary Education Delhi</option>
<option value="Assam Higher Secondary Education Council">Assam Higher Secondary Education Council</option>
<option value="Assam State Open School">Assam State Open School</option>
<option value="ihar Board of Open Schooling &amp; Examination">Bihar Board of Open Schooling &amp; Examination</option>
<option value="Bihar Sanskrit Shiksha Board">Bihar Sanskrit Shiksha Board</option>
<option value="Bihar School Examination Board">Bihar School Examination Board</option>
<option value="Central Board of Secondary Education">Central Board of Secondary Education</option>
<option value="Central Board of Education, Ajmer, Delhi">Central Board of Education, Ajmer, Delhi</option>
<option value="Chhattisgarh Board of Secondary Education">Chhattisgarh Board of Secondary Education</option>
<option value="Council for the Indian School Certificate Examinations">Council for the Indian School Certificate Examinations</option>
<option value="Grameen Mukt Vidhyalayi Shiksha Sansthan">Grameen Mukt Vidhyalayi Shiksha Sansthan</option>
<option value="Goa Board of Secondary &amp; Higher Secondary Education">Goa Board of Secondary &amp; Higher Secondary Education</option>
<option value="Gujarat Secondary Education Board">Gujarat Secondary Education Board</option>
<option value="Haryana Board of School Education">Haryana Board of School Education</option>
<option value="Himachal Pradesh Board of School Education">Himachal Pradesh Board of School Education</option>
<option value="Himachal Pradesh State Open School">Himachal Pradesh State Open School</option>
<option value="Jammu and Kashmir State Board of School Education">Jammu and Kashmir State Board of School Education</option>
<option value="Jammu and Kashmir State Open School">Jammu and Kashmir State Open School</option>
<option value="Jharkhand Academic Council">Jharkhand Academic Council</option>
<option value="Karnataka Secondary Education Examination Board">Karnataka Secondary Education Examination Board</option>
<option value="Kerala Higher Secondary Examination Board">Kerala Higher Secondary Examination Board</option>
<option value="Kerala State Open School">Kerala State Open School</option>
<option value="Board of Secondary Education, Madhya Pradesh">Board of Secondary Education, Madhya Pradesh</option>
<option value="Madhya Pradesh State Open School">Madhya Pradesh State Open School</option>
 <option value="Maharashtra State Board of Secondary and Higher Secondary Education">Maharashtra State Board of Secondary and Higher Secondary Education</option>
<option value="Meghalaya Board of School Education">Meghalaya Board of School Education</option>
<option value="Mizoram Board of School Education">Mizoram Board of School Education</option>
<option value="Nagaland Board of School Education">Nagaland Board of School Education</option>
<option value="National Institute of Open Schooling">National Institute of Open Schooling</option>
<option value="Odisha Board of Secondary Education">Odisha Board of Secondary Education</option>
<option value="Odisha Council of Higher Secondary Education">Odisha Council of Higher Secondary Education</option>
<option value="Punjab School Education Board">Punjab School Education Board</option>
<option value="Board of Secondary Education, Rajasthan">Board of Secondary Education, Rajasthan</option>
<option value="Rajasthan State Open School">Rajasthan State Open School</option>
<option value="Tamil Nadu Board of Secondary Education">Tamil Nadu Board of Secondary Education</option>
<option value="Telangana Board of Intermediate Education">Telangana Board of Intermediate Education</option>
<option value="Telangana Board of Secondary Education">Telangana Board of Secondary Education</option>
<option value="Tripura Board of Secondary Education">Tripura Board of Secondary Education</option>
<option value="Board of High School and Intermediate Education Uttar Pradesh">Board of High School and Intermediate Education Uttar Pradesh</option>
<option value="Uttarakhand Board of School Education">Uttarakhand Board of School Education</option>
<option value="West Bengal Board of Madrasah Education">West Bengal Board of Madrasah Education</option>
<option value="West Bengal Board of Primary Education">West Bengal Board of Primary Education</option>
<option value="West Bengal Board of Secondary Education">West Bengal Board of Secondary Education</option>
<option value="West Bengal Council of Higher Secondary Education">West Bengal Council of Higher Secondary Education</option>
<option value="West Bengal Council of Rabindra Open Schooling">West Bengal Council of Rabindra Open Schooling</option>
                    </select>
                </div>
            </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Year Of Passing</label>
                    <input maxlength="4" type="text" name="yearofpassing" required="required"
                    class="form-control" placeholder="Enter Year Of Passing">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Percentage/CGPA</label>
                    <input maxlength="4" type="text"  name="percentage" required="required"
                    class="form-control" placeholder="Enter Percentage/CGPA">
                </div>
            </div>
                     <h3> Class 12<sup>th</sup>/Diploma</h3>
                
                <div class="row" style="margin-top:15px;">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">School/Institution</label>
                    <input maxlength="200" type="text" required="required" name="institution" 
                    class="form-control" placeholder="Enter School/Institution Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Board</label>
                    <select class="form-control" name="12board">
                         <option value="">Select</option>
<option value="Andhra Pradesh Board of Secondary Education">Andhra Pradesh Board of Secondary Education</option>
<option value="Andhra Pradesh Board of Intermediate Education">Andhra Pradesh Board of Intermediate Education</option>
<option value="Andhra Pradesh Open School Society">Andhra Pradesh Open School Society</option>
<option value="Board of Higher Secondary Education Delhi">Board of Higher Secondary Education Delhi</option>
<option value="Assam Higher Secondary Education Council">Assam Higher Secondary Education Council</option>
<option value="Assam State Open School">Assam State Open School</option>
<option value="ihar Board of Open Schooling &amp; Examination">Bihar Board of Open Schooling &amp; Examination</option>
<option value="Bihar Sanskrit Shiksha Board">Bihar Sanskrit Shiksha Board</option>
<option value="Bihar School Examination Board">Bihar School Examination Board</option>
<option value="Central Board of Secondary Education">Central Board of Secondary Education</option>
<option value="Central Board of Education, Ajmer, Delhi">Central Board of Education, Ajmer, Delhi</option>
<option value="Chhattisgarh Board of Secondary Education">Chhattisgarh Board of Secondary Education</option>
<option value="Council for the Indian School Certificate Examinations">Council for the Indian School Certificate Examinations</option>
<option value="Grameen Mukt Vidhyalayi Shiksha Sansthan">Grameen Mukt Vidhyalayi Shiksha Sansthan</option>
<option value="Goa Board of Secondary &amp; Higher Secondary Education">Goa Board of Secondary &amp; Higher Secondary Education</option>
<option value="Gujarat Secondary Education Board">Gujarat Secondary Education Board</option>
<option value="Haryana Board of School Education">Haryana Board of School Education</option>
<option value="Himachal Pradesh Board of School Education">Himachal Pradesh Board of School Education</option>
<option value="Himachal Pradesh State Open School">Himachal Pradesh State Open School</option>
<option value="Jammu and Kashmir State Board of School Education">Jammu and Kashmir State Board of School Education</option>
<option value="Jammu and Kashmir State Open School">Jammu and Kashmir State Open School</option>
<option value="Jharkhand Academic Council">Jharkhand Academic Council</option>
<option value="Karnataka Secondary Education Examination Board">Karnataka Secondary Education Examination Board</option>
<option value="Kerala Higher Secondary Examination Board">Kerala Higher Secondary Examination Board</option>
<option value="Kerala State Open School">Kerala State Open School</option>
<option value="Board of Secondary Education, Madhya Pradesh">Board of Secondary Education, Madhya Pradesh</option>
<option value="Madhya Pradesh State Open School">Madhya Pradesh State Open School</option>
 <option value="Maharashtra State Board of Secondary and Higher Secondary Education">Maharashtra State Board of Secondary and Higher Secondary Education</option>
<option value="Meghalaya Board of School Education">Meghalaya Board of School Education</option>
<option value="Mizoram Board of School Education">Mizoram Board of School Education</option>
<option value="Nagaland Board of School Education">Nagaland Board of School Education</option>
<option value="National Institute of Open Schooling">National Institute of Open Schooling</option>
<option value="Odisha Board of Secondary Education">Odisha Board of Secondary Education</option>
<option value="Odisha Council of Higher Secondary Education">Odisha Council of Higher Secondary Education</option>
<option value="Punjab School Education Board">Punjab School Education Board</option>
<option value="Board of Secondary Education, Rajasthan">Board of Secondary Education, Rajasthan</option>
<option value="Rajasthan State Open School">Rajasthan State Open School</option>
<option value="Tamil Nadu Board of Secondary Education">Tamil Nadu Board of Secondary Education</option>
<option value="Telangana Board of Intermediate Education">Telangana Board of Intermediate Education</option>
<option value="Telangana Board of Secondary Education">Telangana Board of Secondary Education</option>
<option value="Tripura Board of Secondary Education">Tripura Board of Secondary Education</option>
<option value="Board of High School and Intermediate Education Uttar Pradesh">Board of High School and Intermediate Education Uttar Pradesh</option>
<option value="Uttarakhand Board of School Education">Uttarakhand Board of School Education</option>
<option value="West Bengal Board of Madrasah Education">West Bengal Board of Madrasah Education</option>
<option value="West Bengal Board of Primary Education">West Bengal Board of Primary Education</option>
<option value="West Bengal Board of Secondary Education">West Bengal Board of Secondary Education</option>
<option value="West Bengal Council of Higher Secondary Education">West Bengal Council of Higher Secondary Education</option>
<option value="West Bengal Council of Rabindra Open Schooling">West Bengal Council of Rabindra Open Schooling</option>
                    </select>
                </div>
            </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Year Of Passing</label>
                    <input maxlength="4" type="text" required="required" name="12yop" 
                    class="form-control" placeholder="Enter Year Of Passing">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Percentage/CGPA</label>
                    <input maxlength="4" type="text" required="required" name="12percentage" 
                    class="form-control" placeholder="Enter Percentage/CGPA">
                </div>
            </div>
                <div>
                     <h3> Undergraduate</h3>
                 </div>
                 <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Institution</label>
                    <input maxlength="100" type="text" required="required" name="under_institution" 
                    class="form-control" placeholder="Enter Institute Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">University</label>
                    <input maxlength="100" type="text" required="required" name="under_university" 
                    class="form-control" placeholder="Enter University Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Course</label>
                    <input maxlength="200" type="text" required="required" class="form-control" name="under_course" 
                    placeholder="Enter Course">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Department</label>
                    <select class="form-control" name="under_department">
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
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Year Of Passing</label>
                    <input maxlength="4" type="text" required="required" name="under_yop" 
                    class="form-control" placeholder="Enter Year Of Passing">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Percentage/CGPA</label>
                    <input maxlength="200" type="text" required="required" name="under_percentage" 
                    class="form-control" placeholder="Enter Percentage/CGPA">
                </div>
            </div>

                <button class="btn btn-primary nextBtn float-right" type="button">Next</button>
            </div>
        </div>
        <div class="card setup-content" id="step-3">
            <div class="card-header">
                 <h3 class="card-title">Internships/Projects</h3>
            </div>
            <div class="card-body">
                <div>
                     <h3>Latest Internship/Work Experience</h3>
                </div>
                <div class="row" style="margin-top:15px;">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Company Name</label>
                    <input maxlength="100" type="text" required="required" name="company_name" 
                    class="form-control" placeholder="Enter Company Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Job Title</label>
                    <input maxlength="20" type="text" required="required" name="jobtitle" 
                    class="form-control" placeholder="Enter Job Title">
                </div>
            </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Location</label>
                    <input maxlength="20" type="text" required="required" name="location" 
                    class="form-control" placeholder="Enter Location">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Position Type</label>
                    <select class="form-control" name="positiontype">
                        <option value="">Select</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Internship">Internship</option>
                        <option value="Volunteering Experience">Volunteering Experience</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Job Sector</label>
                    <select class="form-control" name="jobsector">
                        <option value="">Select</option>
                        <option value="Analytics">Analytics</option>
                        <option value="Consulting">Consulting</option>
                        <option value="Computer Science-Software-IT">Computer Science-Software-IT</option>
                        <option value="E-commerce">E-commerce</option>
                        <option value="Education">Education</option>
                        <option value="Engineering And Technology">Engineering And Technology</option>
                        <option value="Finance">Finance</option>
                        <option value="FMCG">FMCG</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Media/Entertainment">Media/Entertainment</option>
                        <option value="Research And Development">Research And Development</option>
                        <option value="Telecom">Telecom</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Details</label>
                    <input maxlength="200" type="text" required="required" name="details" 
                    class="form-control" placeholder="Enter Job Details">
                </div>
            </div>
                <div>
                     <h3>Best Project</h3>
                </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Project Title</label>
                    <input maxlength="100" type="text" required="required" name="projecttitle" 
                    class="form-control" placeholder="Enter Project Title">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Project Link</label>
                    <input maxlength="200" type="url" required="required" name="projectlink" 
                    class="form-control" placeholder="Enter Project Link">
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-form-label">Project Description</label>
                    <input maxlength="200" type="text" required="required" name="projectdescription" 
                    class="form-control" placeholder="Enter Project Description">
                </div>
            </div>
                <button class="btn btn-primary nextBtn float-right" type="button">Next</button>
            </div>
        </div>
        <div class="card setup-content" id="step-4">
            <div class="card-header">
                 <h3 class="card-title">Skills</h3>
            </div>
            <div class="card-body">
                <div>
                     <h3>Technical Skills</h3>
                </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Skills</label>
                    <input maxlength="200" type="text"  name="skills" required="required" class="form-control"
                    placeholder="Enter Technical Skills">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Proficiency</label>
                    <select class="form-control" name="proficiency">
                        <option value="">Select</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advance">Advance</option>
                        <option value="Professional">Professional</option>
                    </select>
                </div>
            </div>
            
            <button type="button" class="btn btn-info float-right" onclick="add_tech_skills()">Add More</button>
            <div id="tech_skills_fields" style="margin-top:40px;">
                </div>      
            <div>
                     <h3>Personal Skills</h3>
                </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Skills</label>
                    <select class="form-control" name="personalskills">
                        <option value="">Select</option>
                        <option value="Communication">Communication</option>
                        <option value="Ability to Work Under Pressure">Ability to Work Under Pressure</option>
                        <option value="Decision Making">Decision Making</option>
                        <option value="Time Management">Time Management</option>
                        <option value="Self-motivation">Self-motivation</option>
                        <option value="Conflict Resolution">Conflict Resolution</option>
                        <option value="Leadership">Leadership</option>
                        <option value="Adaptability">Adaptability</option>
                        <option value="Teamwork">Teamwork</option>
                        <option value="Creativity">Creativity</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Proficiency</label>
                    <select class="form-control" name="personalproficiency">
                        <option value="">Select</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advance">Advance</option>
                        <option value="Professional">Professional</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-info float-right" onclick="add_personal_skills()">Add More</button>
            
            <div id="personal_skills_fields" style="margin-top:40px;">
                </div>       
            <button class="btn btn-primary nextBtn" type="button">Next</button>
            </div>
        </div>
        <div class="card setup-content" id="step-5">
            <div class="card-header">
                 <h3 class="card-title">Extra-Curricular</h3>
            </div>
            <div class="card-body">
                <div class="form-group col-lg-12">
                    <label class="col-form-label">Category</label>
                    <input maxlength="200" type="text" required="required"
                    class="form-control" placeholder="Eg:Singing,Dancing " data-role="tagsinput">
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-form-label">Description</label>
                    <input maxlength="200" type="text" name="description" required="required"
                    class="form-control" placeholder="">
                </div>
                <button class="btn btn-primary nextBtn float-right" type="button">Next</button>
            </div>
        </div>
        <div class="card setup-content" id="step-6">
            <div class="card-header">
                 <h3 class="card-title">Certifications</h3>
            </div>
            <div class="card-body">
            	<div class="row">
                <div class="form-group col-lg-4 col-md-4">
                    <label class="col-form-label">Name</label>
                    <input maxlength="100" type="text" name="certification_name" required="required" class="form-control"
                    placeholder="Enter Certification Name">
                </div>
                <div class="form-group col-lg-4 col-md-4">
                    <label class="col-form-label">Issuing Authority</label>
                    <input maxlength="100" type="text" required="required" name="issuingauthority" 
                    class="form-control" placeholder="Eg:Microsoft,Google">
                </div>
                <div class="form-group col-lg-4 col-md-4">
                    <label class="col-form-label">Certification Url</label>
                    <input maxlength="200" type="url" required="required" name="certification_url" 
                    class="form-control" placeholder="https://www.abc.com">
                </div>
            </div>
            <button type="button" class="btn btn-info float-right" onclick="add_certificate()">Add More</button>
            <div id="certification_fields" style="margin-top:40px;">
                </div>   
            <button class="btn btn-primary nextBtn" type="submit">Finish</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
<script src="{{asset("js/bootstrap-tagsinput.min.js")}}"></script>
<script type="text/javascript">
	$(document).ready(function () {

    var navListItems = $('div.setup-card div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function(e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-info').addClass('btn-default');
            $item.addClass('btn-info');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-card div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='date'],input[type='email']"),
            isValid = true;

        $(".form-group").removeClass("has-danger");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-danger");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-card div a.btn-info').trigger('click');
});

</script>
<script type="text/javascript">
    (function() {
  "use strict";
  window.addEventListener("load", function() {
    var form = document.getElementById("needs-validation");
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  }, false);
}());
</script>
<script>
    let cert=1;
    let tech_skills=1;
    let pers_skills=1;
    function add_tech_skills()
    {
        tech_skills++;
        let objTo = document.getElementById('tech_skills_fields')
        let divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclassTech"+tech_skills);
        let rdiv = 'removeclass'+tech_skills;
       
        divtest.innerHTML =' <div class="row"><div class="form-group col-lg-6 col-md-6"><label class="col-form-label">Skills</label><input maxlength="200" type="text" required="required" class="form-control"placeholder="Enter Technical Skills"></div><div class="form-group col-lg-6 col-md-6"><label class="col-form-label">Proficiency</label><select class="form-control"><option>Select</option><option>Beginner</option><option>Intermediate</option><option>Advance</option><option>Professional</option></select><div class="float-right"><div class="input-group-btn"><button class="btn btn-danger" type="button"  onclick="remove_tech_skills('+ tech_skills +')" style="margin-top:15px;"> Remove </button> </div></div></div></div>';
        objTo.appendChild(divtest)
    }
    function remove_tech_skills(rid)
    {
        $('.removeclassTech'+rid).remove();
    }
    function add_personal_skills()
    {
        pers_skills++;
        let objTo = document.getElementById('personal_skills_fields')
        let divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclassPers"+pers_skills);
        let rdiv = 'removeclass'+pers_skills;
       
        divtest.innerHTML ='<div class="row"><div class="form-group col-lg-6 col-md-6"><label class="col-form-label">Skills</label><select class="form-control"><option>Select</option><option>Communication</option><option>Ability to Work Under Pressure</option><option>Decision Making</option><option>Time Management</option><option>Self-motivation</option><option>Conflict Resolution</option><option>Leadership</option><option>Adaptability</option><option>Teamwork</option><option>Creativity</option></select> </div><div class="form-group col-lg-6 col-md-6"><label class="col-form-label">Proficiency</label><select class="form-control"><option>Select</option><option>Beginner</option><option>Intermediate</option><option>Advance</option><option>Professional</option></select><div class="float-right"><div class="input-group-btn"><button class="btn btn-danger" type="button"  onclick="remove_pers_skills('+ pers_skills +')" style="margin-top:15px;"> Remove </button> </div></div></div></div>';
        objTo.appendChild(divtest)
    }
    
    function remove_pers_skills(rid)
    {
        $('.removeclassPers'+rid).remove();
    }
    function add_certificate()
    {
        cert++;
        let objTo = document.getElementById('certification_fields')
        let divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclassCert"+cert);
        let rdiv = 'removeclass'+cert;
       
        divtest.innerHTML ='<div class="row"><div class="form-group col-lg-4 col-md-4"><label class="col-form-label">Name</label><input maxlength="100" type="text" required="required" class="form-control"placeholder="Enter Certification Name"></div><div class="form-group col-lg-4 col-md-4"><label class="col-form-label">Issuing Authority</label><input maxlength="100" type="text" required="required"class="form-control" placeholder="Eg:Microsoft,Google"></div><div class="form-group col-lg-4 col-md-4"><label class="col-form-label">Certification Url</label><input maxlength="200" type="url" required="required"class="form-control" placeholder="https://www.abc.com"><div class="float-right"><div class="input-group-btn"><button class="btn btn-danger" type="button"  onclick="remove_certification('+ cert +')" style="margin-top:15px;"> Remove </button> </div></div></div></div>';
        objTo.appendChild(divtest)
    }
    function remove_certification(rid)
    {
        $('.removeclassCert'+rid).remove();
    }

    </script>
@endsection