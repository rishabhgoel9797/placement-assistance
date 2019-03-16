@extends('layouts.institute_dashboard')
@section('css')

@section('content')
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                       Enrolled Teacher Details
                    </div>
                    <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Unique Id</th>
                            <th>Program</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($students)>0)
                        @foreach($students as $s)
                        <tr>
                        <td>{{$count++}}</td>
                        <td>{{$s->name}}</td>
                        <td>{{$s->email}}</td>
                        <td>{{$s->unique_id}}</td>
                        <td>{{$s->program}}</td>
                        <td>{{$s->department}}</td>
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