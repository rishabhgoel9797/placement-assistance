@extends('layouts.institute_dashboard')
@section('css')
<style>
.company_info {
max-width: 900px;
margin:0 auto;
border: 1px solid #ccc;
padding:10px;
border-radius: 10px;
}
.eligiblity {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center
}
.round {
    padding: 10px 40px 10px 40px;
    border: 1px solid #ccc;
    background-color: beige
}
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="company_info">
                <h2 style="margin-left:2%;">{{$basic_info->company_name}}</h2>
                <hr>
        <img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c51f.png" class="img-responsive" style="height:50px;">
        <span class="alert alert-success float-right">{{$basic_info->ctc}}</span>
        <span class="alert alert-danger float-right" style="margin-right:10px;">{{$basic_info->status}}</span>
        <div class="badge badge-light" style="display:block;padding:10px;margin-top:10px;">
        <h4 style="display:inline"><i>{{$basic_info->job_role}}</i></h4>
            <h4 style="display:inline" class="float-right"><i>{{$basic_info->category}}</i></h4>    
        </div>
        {{-- <span class="badge badge-light" style="display:block;padding:10px;">{{$basic_info->category}}</span> --}}

    </div>
    </div>
</div>

<div class="row" style="margin-top:20px;">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Company Description
                    </div>
                    <div class="card-body">
                    <p class="card-text">{{$basic_info->company_description}}</p>
                    </div>
                </div>                  
        </div>
        <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Job Description
                    </div>
                    <div class="card-body">
                    <p class="card-text">{{$basic_info->job_description}}</p>
                    </div>
                </div>                  
        </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="badge badge-light" style="display:block;padding:10px;margin-top:10px;">
                <h4 style="display:inline"><i>{{$basic_info->department}}</i></h4>
            </div>
    </div>
</div>
<hr>
<h2>Eligibility Criteria</h2>
<div class="row" style="margin-top:30px;">
    <div class="col-md-4">
        <h5>Tenth</h5>
        <div class="eligiblity">
            <h4>{{$basic_info->tenth}}%</h4>
        </div>
    </div>
    <div class="col-md-4">
            <h5>Twelth</h5>
            <div class="eligiblity">
                <h4>{{$basic_info->twelth}}%</h4>
            </div>
    </div>
    <div class="col-md-4">
            <h5>Graduate</h5>
            <div class="eligiblity">
                <h4>{{$basic_info->graduate}}%</h4>
            </div>
    </div>
</div>
<hr>
<h2>Number of Rounds</h2>
@foreach($company_rounds as $cr)
<div class="row" style="margin-top:30px;">
    <div style="max-width:500px;margin:0 auto;"> 
        <div class="round">
            {{$cr->round_title}}
        </div>
    </div>
</div>
@endforeach
@endsection