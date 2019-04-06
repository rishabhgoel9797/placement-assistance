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
<div class="row">
<div class="col-md-8">
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
            <input class="form-control input-sm" name="name">
        </div>
        <div class="form-group col-md-4 col-sm-4">
                <label for="email">Email</label>
                <input type="email" class="form-control input-sm" name="email">
            </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="unique_id">Registration No</label>
            <input type="text" class="form-control input-sm" name="unique_id">
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
</div>
</div>

<div class="col-md-4">
        <div class="card" style="height:377px;margin:20px;">
                <div class="card-header">
                    Number of Students Enrolled
                </div>
                <div class="card-body" style="text-align:center">
                    <h1 style="font-size:120px; margin-top: 45px">{{$students_count}}</h1>                        
                </div>
              </div>
</div>
</div>
<div class="row" style="margin-top:20px;">
        <div class="col-md-12">
          <div class="float-left">
            <a class="btn btn-warning" href="{{asset('template/Students-Template.xlsx')}}">Download Students Import Template</a>
        </div>    
            <div class="float-right">
                    <button class="btn btn-info" style="cursor:pointer" data-toggle="modal" data-target="#import">Import</button>
                    <button class="btn btn-success"  data-toggle="modal" data-target="#export">Export</button> 
                 </div>
        </div>
     </div>
<div class="row" style="margin-top: 20px;">
<div class="col-md-12 col-sm-12">
        <div class="card" style="margin-left:35px;margin-right:35px;">
                <div class="card-header">
                    Students enrolled for Placements DateWise
                </div>
                <div class="card-body">
            <div id="container-student"></div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Import Students Excel</h4>
        </div>
        <form action="{{ route('importStudents') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
                  <span id="lblError" style="color: red;"></span>
                  <input type="file" name="file_student" id="file_student" required autofocus/>               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="import_submit" class="btn btn-primary" value="Import" onclick="return ValidateExtension()"   >
            </div>
        </form> 
      </div>
    </div>
  </div>

<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              Export Data Using Filters
            </div>
        <form action="{{route('exportStudents')}}" method="post">
            @csrf
            {{-- {{route('editClass')}} --}}
                <div class="modal-body ">
                    <input type="hidden" name="export_id" id="export_id" value="">
                      <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="class_status">Please Choose the Format</label><br>
                                <input type="radio" value="xls" name="radio_export" required>XLS
                                <input type="radio" style="margin-left:20px;" value="xlsx" name="radio_export">XLSX
                               <input type="radio" style="margin-left:20px;" value="csv" name="radio_export">CSV
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </form> 
          </div>
        </div>
      </div>

@endsection

@section('script')
<script type="text/javascript">
  function ValidateExtension() {
      var allowedFiles = [".csv", ".xls", ".xlsx"];
      var fileUpload = document.getElementById("import_file_teacher");
      var lblError = document.getElementById("lblError");
      var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
      if (!regex.test(fileUpload.value.toLowerCase())) {
          lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ')  + "</b> only.";
          return false;
      }
      lblError.innerHTML = "";
      return true;
  }
</script>

<script>
    var dates={!!json_encode($datewise)!!};
    console.log(dates);
    var date_array=[];
    var count_array=[];
    for(var k in dates)
    {
        date_array.push(dates[k].created_date);
        count_array.push(dates[k].total);
    }
Highcharts.chart('container-student', {
    chart: {
    type: 'column'
  },
  credits: {
      enabled: false
  },

title: {
  text: 'Number of Students Enrolled DateWise for placements'
},


yAxis: {
  title: {
    text: 'Number of Students'
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
  name: 'Number of Students',
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