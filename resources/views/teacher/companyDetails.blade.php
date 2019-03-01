@extends('layouts.teacher_dashboard')
@section('css')
@endsection

@section('content')
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                       Companies Visiting/Visited Details
                    </div>
                    <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial Number</th>
                            <th>Company Name</th>
                            <th>Job Role</th>
                            <th>Location</th>
                            <th>ctc</th>
                            <th>department</th>
                            <th>category</th>
                            <th>Tenth Eligibility</th>
                            <th>Twelth Eligibility</th>
                            <th>Graduate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($companyDetails)>0)
                        @foreach($companyDetails as $c)
                        <tr>
                        <td>{{$count++}}</td>
                        <td>{{$c->company_name}}</td>
                        <td>{{$c->job_role}}</td>
                        <td>{{$c->location}}</td>
                        <td>{{$c->ctc}}</td>
                        <td>{{$c->department}}</td>
                        <td>{{$c->category}}</td>
                        <td>{{$c->tenth}}</td>
                        <td>{{$c->twelth}}</td>
                        <td>{{$c->graduate}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
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