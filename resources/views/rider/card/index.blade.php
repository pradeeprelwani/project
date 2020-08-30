@extends('layouts.backend')
@section('content')

@section('additional_css')
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
@endsection
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Cars</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a href="{{route('card.create')}}" class="btn btn-primary">Create</a>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped datatable" id="datatable">
                        <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="15%">Card Number</th>
                                 <th width="15%">Card Holder</th>
                                <th width="15%">Expiry Month</th>
                                <th width="15%">Expiry Year</th>
                                <th width="20%">Created Date</th>
                                <th width="10%">Action</th>
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
        processing: true,
        serverSide: true,
        order: [[ 0, "desc" ]],
        ajax: {
            url: "{{route('card.index')}}",
            dataSrc: "data",
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'card_number', name: 'card_number'},
            {data: 'card_holder', name: 'card_holder'},
             {data: 'expiry_month', name: 'expiry_month'},
             {data: 'expiry_year', name: 'expiry_year'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false}
        ]
    });
});
</script>
@endsection
@endsection