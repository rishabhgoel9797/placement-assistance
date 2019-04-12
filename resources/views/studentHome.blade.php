@extends('layouts.student_dashboard')
@section('content')
<div class="row">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Companies Applications Graph
                    </div>
                    <div class="card-body">
                        <div id="container-applied"></div>
                    </div>
                </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Notifications by your teacher
                </div>
                <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($notifications as $n)
                            <li class="list-group-item"><u>{{$n->title}}</u> <b>{{$n->description}}</b><br>
                            <a href="{{$n->url}}" class="card-link">{{$n->url}}</a>
                            </li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="card" style="margin-left:35px;margin-right:35px;">
                    <div class="card-header">
                        Department Wise Students Attending Placements
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
        var applied={!!json_encode($applied)!!};
        Highcharts.chart('container-applied', {
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
        text: 'Number of Companies you applied for with their status'
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
        data: applied
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
            var departments={!!json_encode($department_wise_students)!!};
           deptKeys=Object.keys(departments);
           console.log(deptKeys);
        Highcharts.chart('container-departments', {
            chart: {
            type: 'pie'
          },
          credits: {
              enabled: false
          },
        
        title: {
          text: 'Number of Students Appleared in placements Department Wise'
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
            categories: Object.keys(departments).name,
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