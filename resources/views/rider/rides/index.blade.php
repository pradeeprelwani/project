@extends('layouts.backend')
@section('content')

@section('additional_css')
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
@endsection
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Rides</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                    <a class="btn btn-primary" href="{{route('rider.rides.create')}}">Create Ride</a>               <div class="table-responsive">
                    <table class="table table-bordered table-striped datatable" id="datatable">
                        <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="15%">Source address</th>
                                 <th width="15%">Destination</th>
                                <th width="15%">Driver</th>
                                <th width="20%">Driver Email</th>
                                <th width="5%">Status</th>
                                <th width="20%">Created Date</th>
                              
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@section('additional_js')
<script src="{{asset('js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function () {
    $('#datatable').DataTable({
        order: [[ 0, "desc" ]],
        ajax: {
            url: "{{route('rider.rides.index')}}",
            dataSrc: "data",
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'source_address', name: 'source_address'},
            {data: 'destination_address', name: 'destination_address'},
            {data: 'driver', name: 'driver'},
            {data: 'driver_email', name: 'driver_email'},
            
             {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'}
        ]
    });
});
</script>
@endsection
@endsection