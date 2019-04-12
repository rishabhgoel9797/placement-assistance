@extends('layouts.institute_dashboard')
@section('css')

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
                            <a class="btn btn-info" href="{{route('singleCompany',$c->company_id)}}">View Profile</a>
                        <a class="btn btn-danger" href="{{url('changeStatus/'.$c->status.'/'.$c->company_id)}}">Change to Ongoing</a>
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
        <div class="tab-pane fade show active" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
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
                                <a class="btn btn-info" href="{{route('singleCompany',$c->company_id)}}">View Profile</a>
                                <a class="btn btn-danger" href="{{url('changeStatus/'.$c->status.'/'.$c->company_id)}}">Change to Completed</a>
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
                    <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                            <div class="tab-pane fade show active" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                    <div class="card">
                                            <div class="card-header">
                                                Completed Company Details
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
                                                @if(count($completed_companies)>0)
                                                @foreach($completed_companies as $c)
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
                                                <a class="btn btn-info" href="{{route('singleCompany',$c->company_id)}}">View Profile</a>
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