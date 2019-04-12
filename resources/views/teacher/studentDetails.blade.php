@extends('layouts.teacher_dashboard')
@section('css')
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
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                       Students Enrolled Under You
                    </div>
                    <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        {{-- <tr> --}}
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Unique ID</th>
                            <th>Program</th>
                            <th>Department</th>
                            <th>10th %</th>
                            <th>12th %</th>
                            <th>Graduate %</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($studentDetails)>0)
                        @foreach($studentDetails as $s)
                        <tr>
                        <td>{{$s['name']}}</td>
                        <td>{{$s['email']}}</td>
                        <td>{{$s['unique_id']}}</td>
                        <td>{{$s['program']}}</td>
                        <td>{{$s['department']}}</td>
                        @if(isset($s['0']))
                        <td>{{$s['0']->ten_perc}}</td>
                        <td>{{$s['0']->twelve_perc}}</td>
                        <td>{{$s['0']->graduate_perc}}</td>
                        <td>
                        <a href="{{route('teacher.studentApproved',$s['student_id'])}}" class="btn btn-primary">Approve</a>
                        </td>
                        @else
                        <td>Tenth Percentage Not setup</td>
                        <td>Twelth Percentage Not setup</td>
                        <td>Graduate Percentage Not setup</td>
                        <td><b>{{$s['status']}}</b> Incomplete Required Profile</td>
                        @endif
                        <td>
                        {{-- <a href="{{route('teacher.eligibleStudents',$c->company_id)}}" class="btn btn-info">Show Students</a> --}}
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
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection