@extends('layouts.institute_dashboard')
@section('content')
<div class="row">
    <h2 style="margin-left: 10px;">Introduction</h2>
    <div class="col-md-12" id="intro">
    </div>
     
</div>
<div id="suggested">
    </div> 
@endsection
@section('script')
<script>
    const ip="http://192.168.31.155:8080/";
 $.ajax({
    type: "GET", //rest Type
    url: ip+"getCompanies",
    success: function (response) {
        console.log(response[1].info);
        document.getElementById("intro").innerHTML=response[1].info;
        var suggestion_block=document.getElementById("suggested");
        for(var i=2;i<response.length;i++)
        {
            suggestion_block.innerHTML+='<br><div class=col-md-12><div class="card"><div class="card-header"><h4>'+response[i].name+'</h4></div><div class="card-body"><h5 class="card-title">'+response[i].headcount+'</h5><p class="card-text">'+response[i].info+'</p></div></div></div><br>'
        }                   
    },
    error: function(error) {
        console.log(error);
    }
 });
</script>
@endsection