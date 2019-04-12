@extends('layouts.student_dashboard')
@section('css')

@section('content')

<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="eligible-tab" data-toggle="tab" href="#eligible" role="tab" aria-controls="eligible" aria-selected="true">Eligible</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="noteligible-tab" data-toggle="tab" href="#noteligible" role="tab" aria-controls="noteligible" aria-selected="false">noteligible</a>
    </li>
</ul>
<div class="row" style="margin-top:50px;">
    <div class="col-md-12">
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="eligible" role="tabpanel" aria-labelledby="eligible-tab">   
            <div class="card">
                <div class="card-header">
                    Eligible Companies
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Job Role</th>
                        <th>Location</th>
                        <th>CTC</th>
                        <th>Category</th>
                        <th>10th %</th>
                        <th>12th %</th>
                        <th>Graduate %</th>
                        <th>Status</th>
                        <th>Company Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($companies)>0)
                    @foreach($companies as $c)
                    @if($edu_details->ten_perc>=$c->tenth&&$edu_details->twelve_perc>=$c->twelth&&$edu_details->graduate_perc>=$c->graduate)
                    <tr>
                    <td>{{$c->company_name}}</td>
                    <td>{{$c->job_role}}</td>
                    <td>{{$c->location}}</td>
                    <td>{{$c->ctc}}</td>
                    <td>{{$c->category}}</td>
                    <td>{{$c->tenth}}</td>
                    <td>{{$c->twelth}}</td>
                    <td>{{$c->graduate}}</td>
                    <td><span class="badge badge-danger">{{$c->status}}</span></td>
                    <td style='white-space: nowrap'>
                        <a class="btn btn-info" href="{{route('individualCompany',$c->company_id)}}">View Profile</a>
                    </td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                </tbody>
            </table>
         </div>
    </div>
    </div>
    <div class="tab-pane fade" id="noteligible" role="tabpanel" aria-labelledby="noteligible-tab"> 
        <div class="tab-pane fade show active" id="noteligible" role="tabpanel" aria-labelledby="noteligible-tab">
          {{-- not eligible comes here         --}}
          <div class="card">
                <div class="card-header">
                    Not Eligible Companies
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Job Role</th>
                        <th>Location</th>
                        <th>CTC</th>
                        <th>Category</th>
                        <th>10th %</th>
                        <th>12th %</th>
                        <th>Graduate %</th>
                        <th>Status</th>
                        <th>Company Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($companies)>0)
                    @foreach($companies as $c)
                    @if($edu_details->ten_perc<$c->tenth||$edu_details->twelve_perc<$c->twelth||$edu_details->graduate_perc<$c->graduate)
                    <tr>
                    <td>{{$c->company_name}}</td>
                    <td>{{$c->job_role}}</td>
                    <td>{{$c->location}}</td>
                    <td>{{$c->ctc}}</td>
                    <td>{{$c->category}}</td>
                    <td>{{$c->tenth}}</td>
                    <td>{{$c->twelth}}</td>
                    <td>{{$c->graduate}}</td>
                    <td><span class="badge badge-danger">{{$c->status}}</span></td>
                    <td style='white-space: nowrap'>
                        <a class="btn btn-info" href="{{route('individualCompany',$c->company_id)}}">View Profile</a>
                    </td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                </tbody>
            </table>
         </div>
    </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection