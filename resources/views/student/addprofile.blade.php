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
                    <input maxlength="100" type="text" required class="form-control"
                    placeholder="Enter Full Name">
                </div>
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Email</label>
                    <input maxlength="100" type="email" required class="form-control"
                    placeholder="Enter Email">
                </div>
                </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Registration Number</label>
                    <input maxlength="100" type="text" required
                    class="form-control" placeholder="Enter Registration Number">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Date Of Birth</label>
                    <input type="date" required class="form-control"
                    placeholder="Enter DOB">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Gender</label>
                    <br>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Permanent Address</label>
                    <input maxlength="100" type="text" required class="form-control"
                    placeholder="Enter Address">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Contact</label>
                    <input maxlength="10" minlength="10" type="text" required
                    class="form-control" placeholder="1234567890">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Alternate Contact</label>
                    <input maxlength="10" type="text" class="form-control"
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
                    <input maxlength="200" type="text" required="required"
                    class="form-control" placeholder="Enter School/Institution Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Board</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Andhra Pradesh Board of Secondary Education</option>
                        <option>Andhra Pradesh Board of Intermediate Education</option>
                        <option>Andhra Pradesh Open School Society</option>
                        <option>Board of Higher Secondary Education Delhi</option>
                        <option>Assam Higher Secondary Education Council</option>
                        <option>Assam State Open School</option>
                        <option>Bihar Board of Open Schooling &amp; Examination</option>
                        <option>Bihar Sanskrit Shiksha Board</option>
                        <option>Bihar School Examination Board</option>
                        <option>Central Board of Secondary Education</option>
                        <option>Central Board of Education, Ajmer, Delhi</option>
                        <option>Chhattisgarh Board of Secondary Education</option>
                        <option>Council for the Indian School Certificate Examinations</option>
                        <option>Grameen Mukt Vidhyalayi Shiksha Sansthan</option>
                        <option>Goa Board of Secondary &amp; Higher Secondary Education</option>
                        <option>Gujarat Secondary Education Board</option>
                        <option>Haryana Board of School Education</option>
                        <option>Himachal Pradesh Board of School Education</option>
                        <option>Himachal Pradesh State Open School</option>
                        <option>Jammu and Kashmir State Board of School Education</option>
                        <option>Jammu and Kashmir State Open School</option>
                        <option>Jharkhand Academic Council</option>
                        <option>Karnataka Secondary Education Examination Board</option>
                        <option>Kerala Higher Secondary Examination Board</option>
                        <option>Kerala State Open School</option>
                        <option>Board of Secondary Education, Madhya Pradesh</option>
                        <option>Madhya Pradesh State Open School</option>
                        <option>Maharashtra State Board of Secondary and Higher Secondary Education</option>
                        <option>Meghalaya Board of School Education</option>
                        <option>Mizoram Board of School Education</option>
                        <option>Nagaland Board of School Education</option>
                        <option>National Institute of Open Schooling</option>
                        <option>Odisha Board of Secondary Education</option>
                        <option>Odisha Council of Higher Secondary Education</option>
                        <option>Punjab School Education Board</option>
                        <option>Board of Secondary Education, Rajasthan</option>
                        <option>Rajasthan State Open School</option>
                        <option>Tamil Nadu Board of Secondary Education</option>
                        <option>Telangana Board of Intermediate Education</option>
                        <option>Telangana Board of Secondary Education</option>
                        <option>Tripura Board of Secondary Education</option>
                        <option>Board of High School and Intermediate Education Uttar Pradesh</option>
                        <option>Uttarakhand Board of School Education</option>
                        <option>West Bengal Board of Madrasah Education</option>
                        <option>West Bengal Board of Primary Education</option>
                        <option>West Bengal Board of Secondary Education</option>
                        <option>West Bengal Council of Higher Secondary Education</option>
                        <option>West Bengal Council of Rabindra Open Schooling</option>
                    </select>
                </div>
            </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Year Of Passing</label>
                    <input maxlength="4" type="text" required="required"
                    class="form-control" placeholder="Enter Year Of Passing">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Percentage/CGPA</label>
                    <input maxlength="4" type="text" required="required"
                    class="form-control" placeholder="Enter Percentage/CGPA">
                </div>
            </div>
                     <h3> Class 12<sup>th</sup>/Diploma</h3>
                
                <div class="row" style="margin-top:15px;">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">School/Institution</label>
                    <input maxlength="200" type="text" required="required"
                    class="form-control" placeholder="Enter School/Institution Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Board</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Andhra Pradesh Board of Secondary Education</option>
                        <option>Andhra Pradesh Board of Intermediate Education</option>
                        <option>Andhra Pradesh Open School Society</option>
                        <option>Board of Higher Secondary Education Delhi</option>
                        <option>Assam Higher Secondary Education Council</option>
                        <option>Assam State Open School</option>
                        <option>Bihar Board of Open Schooling &amp; Examination</option>
                        <option>Bihar Sanskrit Shiksha Board</option>
                        <option>Bihar School Examination Board</option>
                        <option>Central Board of Secondary Education</option>
                        <option>Central Board of Education, Ajmer, Delhi</option>
                        <option>Chhattisgarh Board of Secondary Education</option>
                        <option>Council for the Indian School Certificate Examinations</option>
                        <option>Grameen Mukt Vidhyalayi Shiksha Sansthan</option>
                        <option>Goa Board of Secondary &amp; Higher Secondary Education</option>
                        <option>Gujarat Secondary Education Board</option>
                        <option>Haryana Board of School Education</option>
                        <option>Himachal Pradesh Board of School Education</option>
                        <option>Himachal Pradesh State Open School</option>
                        <option>Jammu and Kashmir State Board of School Education</option>
                        <option>Jammu and Kashmir State Open School</option>
                        <option>Jharkhand Academic Council</option>
                        <option>Karnataka Secondary Education Examination Board</option>
                        <option>Kerala Higher Secondary Examination Board</option>
                        <option>Kerala State Open School</option>
                        <option>Board of Secondary Education, Madhya Pradesh</option>
                        <option>Madhya Pradesh State Open School</option>
                        <option>Maharashtra State Board of Secondary and Higher Secondary Education</option>
                        <option>Meghalaya Board of School Education</option>
                        <option>Mizoram Board of School Education</option>
                        <option>Nagaland Board of School Education</option>
                        <option>National Institute of Open Schooling</option>
                        <option>Odisha Board of Secondary Education</option>
                        <option>Odisha Council of Higher Secondary Education</option>
                        <option>Punjab School Education Board</option>
                        <option>Board of Secondary Education, Rajasthan</option>
                        <option>Rajasthan State Open School</option>
                        <option>Tamil Nadu Board of Secondary Education</option>
                        <option>Telangana Board of Intermediate Education</option>
                        <option>Telangana Board of Secondary Education</option>
                        <option>Tripura Board of Secondary Education</option>
                        <option>Board of High School and Intermediate Education Uttar Pradesh</option>
                        <option>Uttarakhand Board of School Education</option>
                        <option>West Bengal Board of Madrasah Education</option>
                        <option>West Bengal Board of Primary Education</option>
                        <option>West Bengal Board of Secondary Education</option>
                        <option>West Bengal Council of Higher Secondary Education</option>
                        <option>West Bengal Council of Rabindra Open Schooling</option>
                    </select>
                </div>
            </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Year Of Passing</label>
                    <input maxlength="4" type="text" required="required"
                    class="form-control" placeholder="Enter Year Of Passing">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Percentage/CGPA</label>
                    <input maxlength="4" type="text" required="required"
                    class="form-control" placeholder="Enter Percentage/CGPA">
                </div>
            </div>
                <div>
                     <h3> Undergraduate</h3>
                 </div>
                 <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Institution</label>
                    <input maxlength="100" type="text" required="required"
                    class="form-control" placeholder="Enter Institute Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">University</label>
                    <input maxlength="100" type="text" required="required"
                    class="form-control" placeholder="Enter University Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Course</label>
                    <input maxlength="200" type="text" required="required" class="form-control"
                    placeholder="Enter Course">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Department</label>
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
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Year Of Passing</label>
                    <input maxlength="4" type="text" required="required"
                    class="form-control" placeholder="Enter Year Of Passing">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Percentage/CGPA</label>
                    <input maxlength="200" type="text" required="required"
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
                     <h3>Internship/Work Experience</h3>
                </div>
                <div class="row" style="margin-top:15px;">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Company Name</label>
                    <input maxlength="100" type="text" required="required"
                    class="form-control" placeholder="Enter Company Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Job Title</label>
                    <input maxlength="20" type="text" required="required"
                    class="form-control" placeholder="Enter Job Title">
                </div>
            </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Location</label>
                    <input maxlength="20" type="text" required="required"
                    class="form-control" placeholder="Enter Location">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Position Type</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Full Time</option>
                        <option>Internship</option>
                        <option>Volunteering Experience</option>
                        <option>Others</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Job Sector</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Analytics</option>
                        <option>Consulting</option>
                        <option>Computer Science-Software-IT</option>
                        <option>E-commerce</option>
                        <option>Education</option>
                        <option>Engineering And Technology</option>
                        <option>Finance</option>
                        <option>FMCG</option>
                        <option>Healthcare</option>
                        <option>Media/Entertainment</option>
                        <option>Research And Development</option>
                        <option>Telecom</option>
                        <option>Others</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Details</label>
                    <input maxlength="200" type="text" required="required"
                    class="form-control" placeholder="Enter Job Details">
                </div>
            </div>
                <div>
                     <h3>Projects</h3>
                </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Project Title</label>
                    <input maxlength="100" type="text" required="required"
                    class="form-control" placeholder="Enter Project Title">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Project Link</label>
                    <input maxlength="200" type="url" required="required"
                    class="form-control" placeholder="Enter Project Link">
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-form-label">Project Description</label>
                    <input maxlength="200" type="text" required="required"
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
                    <input maxlength="200" type="text" required="required" class="form-control"
                    placeholder="Enter Technical Skills">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Proficiency</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Beginner</option>
                        <option>Intermediate</option>
                        <option>Advance</option>
                        <option>Professional</option>
                    </select>
                </div>
            </div>
                <div>
                     <h3>Personal Skills</h3>
                </div>
                <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Skills</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Communication</option>
                        <option>Ability to Work Under Pressure</option>
                        <option>Decision Making</option>
                        <option>Time Management</option>
                        <option>Self-motivation</option>
                        <option>Conflict Resolution</option>
                        <option>Leadership</option>
                        <option>Adaptability</option>
                        <option>Teamwork</option>
                        <option>Creativity</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Proficiency</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Beginner</option>
                        <option>Intermediate</option>
                        <option>Advance</option>
                        <option>Professional</option>
                    </select>
                </div>
            </div>
                <button class="btn btn-primary nextBtn float-right" type="button">Next</button>
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
                    class="form-control" placeholder="Eg:Singing,Dancing ">
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-form-label">Description</label>
                    <input maxlength="200" type="text" required="required"
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
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Name</label>
                    <input maxlength="100" type="text" required="required" class="form-control"
                    placeholder="Enter Certification Name">
                </div>
                <div class="form-group col-lg-6 col-md-6">
                    <label class="col-form-label">Issuing Authority</label>
                    <input maxlength="100" type="text" required="required"
                    class="form-control" placeholder="Eg:Microsoft,Google">
                </div>
                <div class="form-group col-lg-12">
                    <label class="col-form-label">Certification Url</label>
                    <input maxlength="200" type="url" required="required"
                    class="form-control" placeholder="https://www.abc.com">
                </div>
            </div>
                <button class="btn btn-primary nextBtn float-right" type="submit">Finish</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
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
@endsection