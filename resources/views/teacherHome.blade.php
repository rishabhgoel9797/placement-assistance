@extends('layouts.teacher_dashboard')
@section('content')
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
<div class="row" style="margin-top: 50px;">
        <div class="col-md-12 col-sm-12">
                <div class="card" style="margin-left:35px;margin-right:35px;">
                    <div class="card-header">
                        Companies Visited in each category
                    </div>
                <div class="card-body">
                    <div id="container-company"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
<script>
        var categories={!!json_encode($categoryWise)!!};
        var category_array=[];
        var count_array=[];
        for(var k in categories)
        {
            category_array.push(categories[k].category);
            count_array.push(categories[k].total);
        }
    Highcharts.chart('container-company', {
        chart: {
        type: 'column'
      },
      credits: {
          enabled: false
      },
    
    title: {
      text: 'Number of Companies Of Each Category'
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
        text: 'Categories'
      },
        categories: category_array,
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