@extends('layouts.student_dashboard')
@section('css')
<style>
.card-body {
    color: #fff;
    font-size: 80px;
}
</style>
@endsection
@section('content')
<div class="card-deck">
    <div class="card bg-danger">
        <div class="card-body text-center">
        <h3 class="card-text">MASS</h3>
        <p>{{$mass}}</p>
        </div>
    </div>
    <div class="card bg-success">
        <div class="card-body text-center">
        <h3 class="card-text">DREAM</h3>
        <p>{{$dream}}</p>
        </div>
    </div>
    <div class="card bg-info">
        <div class="card-body text-center">
        <h3 class="card-text">SUPER-DREAM</h3>
        <p>{{$superdream}}</p>
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