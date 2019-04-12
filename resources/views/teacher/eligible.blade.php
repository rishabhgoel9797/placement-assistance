@extends('layouts.teacher_dashboard')
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
        <a class="nav-link active" id="applied-tab" data-toggle="tab" href="#applied" role="tab" aria-controls="applied" aria-selected="true">Applied</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">Rejected</a>
    </li>
    <li class="nav-item">
            <a class="nav-link" id="offered-tab" data-toggle="tab" href="#offered" role="tab" aria-controls="offered" aria-selected="false">Offered</a>
    </li>
</ul>
<div class="row" style="margin-top:50px;">
    <div class="col-md-12">
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="applied" role="tabpanel" aria-labelledby="applied-tab">   
            <div class="card">
                <div class="card-header">
                    Applied
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Student Unique ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($applied)>0)
                    @foreach($applied as $a)
                    <tr>
                    <td>{{$a->student_unique_id}}</td>
                    <td>{{$a->status}}</td>
                    <td>
                    <a href="/teacher/changeStudentStatus/{{$a->company_id}}/{{$a->student_id}}/Rejected" class="btn btn-danger">Rejected</a>
                        <a href="/teacher/changeStudentStatus/{{$a->company_id}}/{{$a->student_id}}/Offered" class="btn btn-primary">Offered</a>
                    </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
         </div>
    </div>
    </div>
    <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab"> 
        <div class="tab-pane fade show active" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
          {{-- not eligible comes here         --}}
          <div class="card">
                <div class="card-header">
                    Rejected Companies
                </div>
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Student Unique ID</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($rejected)>0)
                    @foreach($rejected as $r)
                    <tr>
                    <td>{{$r->student_unique_id}}</td>
                    <td>{{$r->status}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
         </div>
    </div>
        </div>
    </div>
    <div class="tab-pane fade" id="offered" role="tabpanel" aria-labelledby="offered-tab"> 
            <div class="tab-pane fade show active" id="offered" role="tabpanel" aria-labelledby="rejected-tab">
              {{-- not eligible comes here         --}}
              <div class="card">
                    <div class="card-header">
                        Offered Companies
                    </div>
                    <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Student Unique ID</th>
                            <th>Offered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($offered)>0)
                        @foreach($offered as $o)
                        <tr>
                        <td>{{$o->student_unique_id}}</td>
                        <td>{{$o->status}}</td>
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
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection