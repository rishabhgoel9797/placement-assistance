@extends('layouts.institute_dashboard')
@section('css')
<style type="text/css">
/* #deceased{
    background-color:#FFF3F5;
  padding-top:10px;
  margin-bottom:10px;
}
.remove_field{
  float:right;  
  cursor:pointer;
  position : absolute;
}
.remove_field:hover{
  text-decoration:none;
} */
</style>
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
<div class="row">
<div class="col-md-8">
<div class="card">
    <div class="card-header">
        Notification Panel
    </div>
    <div class="card-body">
        <form action="{{route('addNotification')}}" method="post">
            @csrf
          
              <div class="row" style="margin-top:15px;">
              <div class="form-group col-md-12 col-sm-12">
                      <label for="name">Title</label>
                      <input type="text" class="form-control input-sm" id="Title" name="title" required="" placeholder="Enter Title">
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                      <label for="reg-no">Description</label>
                      <textarea class="form-control input-sm" id="Description" name="description" rows="3" required="" placeholder="Enter Description"></textarea>
                  </div>
          </div>
          <button type="submit" class="btn btn-primary d-block mx-auto">Notify</button>
          </form>
    </div>
  </div>
    </div>
    <div class="col-md-4">
            <div class="card" style="height:377px;">
                    <div class="card-header">
                        Number of Notifications Sent
                    </div>
                    <div class="card-body" style="text-align:center">
                        <h1 style="font-size:120px; margin-top: 45px">{{$ins_not}}</h1>                        
                    </div>
                  </div>
    </div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-md-12">
        <div class="float-right">
            <button class="btn btn-info disabled" style="cursor:not-allowed">Import<small>(Coming Soon)</small></button>
            <button class="btn btn-success"  data-toggle="modal" data-target="#export">Export</button> 
         </div>
</div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    Notifications Details
                </div>
                <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($notifications)>0)
                    @foreach($notifications as $n)
                    <tr>
                    <td>{{$count++}}</td>
                    <td>{{$n->title}}</td>
                    <td>{{$n->description}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th>Serial Number</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                </tfoot> --}}
            </table>
</div>
</div>
</div>
</div>
<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              Export Data Using Filters
            </div>
        <form action="{{route('exportNotifications')}}" method="post">
            @csrf
            {{-- {{route('editClass')}} --}}
                <div class="modal-body ">
                    <input type="hidden" name="export_id" id="export_id" value="">
                      <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="class_status">Please Choose the Format</label><br>
                                <input type="radio" value="xls" name="radio_export" required>XLS
                                <input type="radio" style="margin-left:20px;" value="xlsx" name="radio_export">XLSX
                               <input type="radio" style="margin-left:20px;" value="csv" name="radio_export">CSV
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </form> 
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