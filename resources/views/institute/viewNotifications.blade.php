@extends('layouts.institute_dashboard')
@section('css')

@section('content')
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
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection