@extends('layouts.teacher_dashboard')
@section('css')
@endsection

@section('content')
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                       Other Teachers involved in placement process of your Department
                    </div>
                    <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registration Number</th>
                            <th>Program</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($otherTeachers)>0)
                        @foreach($otherTeachers as $o)
                        <tr>
                        <td>{{$o->name}}</td>
                        <td>{{$o->email}}</td>
                        <td>{{$o->unique_id}}</td>
                        <td>{{$o->program}}</td>
                        <td>{{$o->department}}</td>
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