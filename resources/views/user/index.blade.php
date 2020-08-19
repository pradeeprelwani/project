@extends('layouts.backend')
@section('content')
@section('additional_css')
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
@endsection
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Users</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="Hobbes">Hobbies</label>
                            <select class="form-control" id="hobbies">
                                <option value="">Select</option>
                                @if($hobbies)
                                @foreach($hobbies as $hobby)
                                <option value="{{$hobby->id}}">{{$hobby->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-5">

                            <label for="Hobbes">Hobbes</label>
                            <select class="form-control" id="gender">
                                <option value="">Select</option>

                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="button" id="ajax-filter" class="btn btn-primary">Submit</button>
                        </div>
                    </div>




                </form>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped datatable" id="datatable">
                        <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="14%">Name</th>
                                <th width="10%">Email</th>
                                <th width="3%">Gender</th>
                                <th width="22%">Created Date</th>
                                <th width="25%">Action</th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>


</div>
@section('additional_js')

<script>
    $(document).ready(function () {
        $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, "desc"]],
            ajax: {
                url: "{{route('user.index')}}",
                dataSrc: "data",
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'gender', name: 'gender', orderable: false},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false}
            ]
        });
    });
    $("#ajax-filter").click(function(){
        let hobbies= $("#hobbies").val();
        let gender= $("#gender").val();
        $.ajax({
           url: "{{route('user.index')}}",
           method: "GET",
           dataType:"json",
           success:function(response){
               
           },
           error:function(error){
               
           }
           
        })
    })
</script>
@endsection
@endsection
