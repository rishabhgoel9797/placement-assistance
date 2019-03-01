@extends('layouts.institute_dashboard')
@section('css')

@section('content')

<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="upcoming-tab" data-toggle="tab" href="#upcoming" role="tab" aria-controls="upcoming" aria-selected="true">Upcoming</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="ongoing-tab" data-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing" aria-selected="false">Ongoing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
        </li>
      </ul>
<div class="row" style="margin-top:50px;">
    <div class="col-md-12">
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
            <div class="row" style="margin-top:10px;margin-bottom:10px;">
                    <div class="col-md-12">
                            <div class="float-right">
                                <button class="btn btn-info disabled" style="cursor:not-allowed">Import<small>(Coming Soon)</small></button>
                                        <button class="btn btn-success"  data-toggle="modal" data-target="#export">Export</button> 
                                </div>
                            </div>
                    </div>      
        <div class="card">
                    <div class="card-header">
                        Upcoming Company Details
                    </div>
                    <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial Number</th>
                            <th>Company</th>
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
                        <tr>
                        <td>{{$count++}}</td>
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
                            <button class="btn btn-warning disabled" style="cursor:not-allowed">Update Company<small>(coming soon)</small></button>
                        </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
    </div>
    </div>
    </div>
    <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
            <div class="row" style="margin-top:10px;margin-bottom:10px;">
                    <div class="col-md-12">
                            <div class="float-right">
                                <button class="btn btn-info disabled" style="cursor:not-allowed">Import<small>(Coming Soon)</small></button>
                                        <button class="btn btn-success"  data-toggle="modal" data-target="#export">Export</button> 
                                </div>
                            </div>
                    </div>    
        <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                    <div class="card">
                            <div class="card-header">
                                Ongoing Company Details
                            </div>
                            <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Serial Number</th>
                                    <th>Company</th>
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
                                @if(count($ongoing_companies)>0)
                                @foreach($ongoing_companies as $c)
                                <tr>
                                <td>{{$count++}}</td>
                                <td>{{$c->company_name}}</td>
                                <td>{{$c->job_role}}</td>
                                <td>{{$c->location}}</td>
                                <td>{{$c->ctc}}</td>
                                <td>{{$c->category}}</td>
                                <td>{{$c->tenth}}</td>
                                <td>{{$c->twelth}}</td>
                                <td>{{$c->graduate}}</td>
                                <td><span class="badge badge-dark">{{$c->status}}</span></td>
                                <td style='white-space: nowrap'>
                                <a class="btn btn-info" href="{{route('individualCompany',$c->company_id)}}">View Profile</a>
                                    <button class="btn btn-warning disabled" style="cursor:not-allowed">Update Company<small>(coming soon)</small></button>
                                </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
            </div>
            </div>
            </div>
    </div>
                    <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">Completed</div>
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