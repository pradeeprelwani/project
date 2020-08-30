@extends('layouts.driver_backend')
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

                <div class="table-responsive">
                    <table class="table table-bordered table-striped datatable" id="datatable">
                        <thead>
                            <tr>
                                <th width="5%"><input type="checkbox" id="all_checkbox" name="all_checkbox"></th>
                                <th width="10%">Rider Name</th>
                                <th width="10%">Rider Phone</th>
                                <th width="15%">Source</th>
                                <th width="15%">Destination</th>
                                <th width="5%">Status</th>
                                <th width="10%">Created Date</th>
                                <th width="15%">Action</th>
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
    var oTable = $('.datatable').DataTable({
        processing: false,
        serverSide: true,
        order: [[1, "desc"]],
        ajax: {
            url: "{{route('rides.index')}}",
            dataSrc: "data",
        },
        columns: [
            {data: 'id', name: 'id'},  
            {data: 'rider', name: 'rider'},
             {data: 'rider_phone', name: 'rider_phone'},
            {data: 'source_address', name: 'source_address'},
            {data: 'destination_address', name: 'destination_address'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false}
        ]
    });


    $("#all_checkbox").on("change", function () {
        oTable.$("input[type='checkbox']").attr('checked', $(this.checked));
    });
});





</script>
@endsection
@endsection