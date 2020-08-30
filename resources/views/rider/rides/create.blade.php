@extends('layouts.backend')
@section('content')

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


                <a href="{{route('rider.rides.index')}}" class="btn btn-primary">Rides</a>
                <form id="book-ride" novalidate=""  action="{{route('rider.rides.store')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Source</label>
                                <input name="source_address" type="text" class="form-control" id="source_address" value="{{old('source_address')}}">
                                <input name="source_lat" type="hidden" class="form-control" id="source_lat" value="">
                                <input name="source_long" type="hidden" class="form-control" id="source_long" value="">
                                <span class="text-danger"> <strong>{{$errors->first('source_address')}}</strong></span>

                            </div>
                            <div class="form-group">
                                <label for="">Destination address</label>
                                <input name="destination_address" type="text" class="form-control" id="destination_address"   value="{{old('destination_address')}}">
                                <input name="destination_lat" type="hidden" class="form-control" id="destination_lat" value="">
                                <input name="destination_long" type="hidden" class="form-control" id="destination_long" value="">
                                <span class="text-danger"> <strong>{{$errors->first('destination_address')}}</strong></span>
                            </div>




                            <div class="form-group">
                                <input name="submit" id="book-ride" type="submit" value="submit" class="btn btn-primary" >
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


</div>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyC6wuUJP7s2pfEEc2D8jIpNAtEH31kjLAc"></script>
<script type="text/javascript">
google.maps.event.addDomListener(window, 'load', function () {
    var source = new google.maps.places.Autocomplete(document.getElementById('source_address'), {
        types: ['geocode']
    });
    var destination = new google.maps.places.Autocomplete(document.getElementById('destination_address'), {
        types: ['geocode']
    });
    google.maps.event.addListener(source, 'place_changed', function () {
        var place = source.getPlace();
        document.getElementById('source_lat').value = place.geometry.location.lat();
        document.getElementById('source_long').value = place.geometry.location.lng();
        document.getElementById('source_address').value = place.formatted_address;

    });
    google.maps.event.addListener(destination, 'place_changed', function () {
        var place = destination.getPlace();
        document.getElementById('destination_lat').value = place.geometry.location.lat();
        document.getElementById('destination_long').value = place.geometry.location.lng();
        document.getElementById('destination_address').value = place.formatted_address;
    });


//    console.log(data);
});


</script>

<!--
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyACnxhqQ9NTcEZOmGdT4GDWGpQWrPzzJbE"></script>



<script>
    var searchInput = 'search_input';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
    });
        
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        document.getElementById('loc_lat').value = near_place.geometry.location.lat();
        document.getElementById('loc_long').value = near_place.geometry.location.lng();
    });
});

</script>-->
@endsection
