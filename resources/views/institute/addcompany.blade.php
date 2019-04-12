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
#container-company {
  height: 400px;
}
.bootstrap-tagsinput {
    padding: 8px 6px;
}
</style>
 <link href="{{asset("css/bootstrap-tagsinput.css")}}" rel="stylesheet">
@endsection
@section('content')
<!-- <!doctype html>
<html><head></head><body> -->
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
    <h3 class="card-title">Company Registration</h3>
    </div>
<div class="card-block">
<form enctype="multipart/form-data" action="{{route('addCompany')}}" method="post">
    @csrf
<div class="col-md-12 col-sm-12">
    <div class="row" style="margin-top:15px;">
    <div class="form-group col-md-6 col-sm-6">
            <label for="Companyname">Company Name</label>
            <input type="text" class="form-control input-sm" name="company_name" id="Company-Name" required="" placeholder="Enter Company Name">
        </div>
        <div class="form-group col-md-6">
            <label for="JobRole">Job Role</label>
            <input type="text" class="form-control input-sm" name="job_role" id="Job-Role" required="" placeholder="Enter Job Role">
        </div>
    </div>
<div class="row">
        <div class="form-group col-md-6">
            <label for="CompanyDescription">Company Description</label>
           <textarea class="form-control input-sm" name="company_description" id="Company-Description" rows="3" required="" placeholder="Enter Company Description"></textarea>
       </div>

    <div class="form-group col-md-6 col-sm-6">
          <label for="address">Job Description</label>
          <textarea class="form-control input-sm" name="job_description" id="Job-Description" rows="3" required="" placeholder="Enter Job Description"></textarea>
       </div>
   </div>
  <div class="row">  
    <div class="form-group col-md-6 col-sm-6">
            <label for="Location">Location</label>
            <input type="text" class="form-control input-sm" name="location" id="locationTextField" required="" placeholder="Enter Location">
        </div>
        
    
    <div class="form-group col-md-6 col-sm-6">
            <label for="CTC">CTC</label>
            <input type="text" class="form-control input-sm" name="ctc" id="CTC" required="" placeholder="Enter CTC">
        </div>
</div>
<div class="row">

    <div class="form-group col-md-6 col-sm-6">
            <label for="Category">Category</label>
            <br>
            <select class="form-control" name="category">
                <option>Select</option>
             <option value="Mass">Mass</option>
             <option value="Dream">Dream</option>
             <option value="SuperDream">Super-Dream</option>
             
            </select>
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="departments">Departments</label>
            <input class="form-control" name="department" data-role="tagsinput" placeholder="Add Departments">
        </div>
        <div class="form-group col-md-12 col-sm-12">
        <label>Eligibility Criteria</label>
</div>
   <div class="form-group col-md-4 col-sm-4">
            <label for="class-X">(Class X<sup>th</sup>)</label>
             <br>
            <select class="form-control" name="tenth">
                <option>Select</option>
             <option value="60">&gt;=60%</option>
             <option value="70">&gt;70%</option>
             <option value="80">&gt;80%</option>
             <option value="85">&gt;85%</option>
             
            </select>
        </div>
        <br>
        <div class="form-group col-md-4 col-sm-4">
            <label for="calss-XII">(Class XII<sup>th</sup>)</label>
             <br>
            <select class="form-control" name="twelth">
                <option>Select</option>
            <option value="60">&gt;=60%</option>
             <option value="70">&gt;70%</option>
             <option value="80">&gt;80%</option>
             <option value="85">&gt;85%</option>
             
            </select>
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="ug/diploma">(UG/Diploma)</label>
             <br>
            <select class="form-control" name="graduate">
                <option>Select</option>
             <option value="60">&gt;=60%</option>
             <option value="70">&gt;70%</option>
             <option value="80">&gt;80%</option>
             <option value="85">&gt;85%</option>
             
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
        <input type="file" name="avatar" class="form-control-file">

      </div>
  </div>
  </div>
            <button type="submit" class="btn btn-primary d-block mx-auto">Add Company</button>

</div>
</form>
</div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
            <div class="card" style="margin-left:35px;margin-right:35px;">
                    <div class="card-header">
                        Companies Visited DateWise
                    </div>
                    <div class="card-body">
                <div id="container-company"></div>
        </div>
    </div>
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
            divtest.innerHTML = ' <div class="row"><div class="col-sm-6"><label for="round_number">Round Number</label><div class="form-group"><input type="text" name="round_number[]"  class="form-control round-input" placeholder="Round No." required/></div></div><div class="col-sm-6"><label for="round_title">Round Title</label><div class="form-group"><select class="form-control" name="round_title[] required"><option>Select</option><option value="Online Test">Online Test</option><option value="Pre-Placement Talk">Pre-Placement Talk</option><option value="Group Discussion">Group Discussion</option><option value="Technical Interview">Technical Interview</option><option value="HR Interview">HR Interview</option></select></div></div></div>';
            objTo.appendChild(divtest);

           
            
         }
         var rounds=document.getElementsByClassName('round-input');
         for(var i=0;i<rounds.length;i++)
         {
             rounds[i].value="Round "+(i+1);
         }
        
        }
 </script>
 
 </script>
 <script src="{{asset("js/bootstrap-tagsinput.min.js")}}"></script>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPAXdx0-ZoxDaa8pGK5YIP6TcuEDwwYWA&libraries=places"></script>
 <script>
    function init() {
        var input = document.getElementById('locationTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
    }

    google.maps.event.addDomListener(window, 'load', init);
</script>
<script>
    var dates={!!json_encode($datewise)!!};
    var date_array=[];
    var count_array=[];
    for(var k in dates)
    {
        date_array.push(dates[k].created_date);
        count_array.push(dates[k].total);
    }
Highcharts.chart('container-company', {
    chart: {
    type: 'column'
  },
  credits: {
      enabled: false
  },

title: {
  text: 'Number of Companies Visited DateWise'
},


yAxis: {
  title: {
    text: 'Number of Companies'
  }
},
legend: {
  layout: 'horizontal',
  align: 'center',
  verticalAlign: 'bottom'
},
xAxis: {
    title: {
    text: 'Dates'
  },
    categories: date_array,
    crosshair: true
  },

series: [{
  name: 'Number of Companies',
  data: count_array
}],
exporting: {
      buttons: {
        contextButton: {
          menuItems: Highcharts.getOptions().exporting.buttons.contextButton.menuItems.filter(item => item !== 'openInCloud')
        }
      }
    },
responsive: {
  rules: [{
    condition: {
      maxWidth: 500
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});
</script>
 @endsection