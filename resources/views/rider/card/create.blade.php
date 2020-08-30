@extends('layouts.backend')
@section('content')

<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Cards</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
               

                <a href="{{route('card.index')}}" class="btn btn-primary">Cards</a>
                <form id="card-add" novalidate=""  action="{{route('card.store')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Card Number</label>
                                <input name="card_number" type="text" class="form-control" id="card_number" value="{{old('card_number')}}">
                                <span class="text-danger"> <strong>{{$errors->first('card_number')}}</strong></span>

                            </div>
                            <div class="form-group">
                                <label for="">Card Holder</label>
                                <input name="card_holder" type="text" class="form-control" id="card_holder"   value="{{old('card_holder')}}">
                                <span class="text-danger"> <strong>{{$errors->first('card_holder')}}</strong></span>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Expiry Month</label>
                                        <select class="form-control" name="expiry_month" id="expiry_month">
                                            <option value="">Select</option>
                                            @for($i=1;$i<=12;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>

                                        <span class="text-danger"> <strong>{{$errors->first('expiry_month')}}</strong></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Expiry Year</label>
                                        <select class="form-control" name="expiry_year" id="expiry_year">
                                            <option value="">Select</option>
                                            @for($i=date('Y');$i<=date('Y')+20; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                        <span class="text-danger"> <strong>{{$errors->first('expiry_year')}}</strong></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Cvv</label>
                                        <input name="cvv" type="text" class="form-control" id="cvv" >

                                        <span class="text-danger"> <strong>{{$errors->first('cvv')}}</strong></span>

                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <input name="submit" type="submit" value="submit" class="btn btn-primary" >
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


</div>

@endsection
