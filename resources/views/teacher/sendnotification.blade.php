@extends('layouts.teacher_dashboard')
@section('css')
<style type="text/css">
#deceased{
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
}
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
        <form action="" method="post">
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
                  <div class="form-group col-md-12 col-sm-12">
                      <label for="reg-no">URL</label>
                      <textarea class="form-control input-sm" id="Url" name="url" rows="3" required="" placeholder="Enter URL"></textarea>
                  </div>
          </div>
          <button type="submit" class="btn btn-primary d-block mx-auto">Notify Students</button>
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
                        <h1 style="font-size:230px;">3</h1>                        
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