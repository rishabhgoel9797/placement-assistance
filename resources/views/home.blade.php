@extends('layouts.institute_dashboard')
@section('content')
<div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-briefcase"></i>
                  </div>
                  <div class="mr-5">Companies<div>{{$comp_count}}</div></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">Teachers<div>{{$tea_count}}</div></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">Students<div>{{$stu_count}}</div></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-bell"></i>
                  </div>
                <div class="mr-5">Notifications Sent<div>{{$ins_not}}</div></div>
                
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-md-6 col-sm-6">
                      <div class="card" style="margin-left:35px;margin-right:35px;">
                              <div class="card-header">
                                  Department Wise Students
                              </div>
                              <div class="card-body">
                          <div id="container-deptStudents"></div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-sm-6">
              <div class="card" style="margin-left:35px;margin-right:35px;">
                      <div class="card-header">
                          Department Wise Teachers
                      </div>
                      <div class="card-body">
                  <div id="container-deptTeachers"></div>
          </div>
      </div>
  </div>
          </div>
          <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="card" style="margin-left:35px;margin-right:35px;">
                    <div class="card-header">
                        Department Wise Companies Visited
                    </div>
                    <div class="card-body">
                <div id="container-departments"></div>
        </div>
    </div>
            </div>
          </div>

@endsection

@section('script')
<script>
    var deptWiseStudents={!!json_encode($department_wise_students)!!};
    console.log(deptWiseStudents);
    Highcharts.chart('container-deptStudents', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  credits: {
      enabled: false
  },
  title: {
    text: 'Number of Students Enrolled in placement Department Wise'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
    name: 'Number Of Students',
    colorByPoint: true,
    data: deptWiseStudents
  }],
  
exporting: {
      buttons: {
        contextButton: {
          menuItems: Highcharts.getOptions().exporting.buttons.contextButton.menuItems.filter(item => item !== 'openInCloud')
        }
      }
    }
});
</script>
<script>
    var deptWiseTeachers={!!json_encode($department_wise_teachers)!!};
    Highcharts.chart('container-deptTeachers', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  credits: {
      enabled: false
  },
  title: {
    text: 'Number of Teachers Enrolled in placement Department Wise'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
    name: 'Number Of Teachers',
    colorByPoint: true,
    data: deptWiseTeachers
  }],
  
exporting: {
      buttons: {
        contextButton: {
          menuItems: Highcharts.getOptions().exporting.buttons.contextButton.menuItems.filter(item => item !== 'openInCloud')
        }
      }
    }
});
</script>
<script>
    var departments={!!json_encode($deps_values)!!};
   deptKeys=Object.keys(departments);
   console.log(Object.values(departments));
Highcharts.chart('container-departments', {
    chart: {
    type: 'line'
  },
  credits: {
      enabled: false
  },

title: {
  text: 'Number of Companies Visited Department Wise'
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
    text: 'Departments'
  },
    categories: Object.keys(departments),
    crosshair: true
  },

series: [{
  name: 'Number of Companies',
  data: Object.values(departments)
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