@extends('layouts.app')

@section('content')
@section('extra_css')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" id="register-form" novalidate="" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                <span class="text-danger"> <strong>{{$errors->first('name')}}</strong></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                <span class="text-danger"> <strong>{{$errors->first('email')}}</strong></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone">
                                <span class="text-danger"> <strong>{{$errors->first('phone')}}</strong></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>
                            <div class="col-md-2">
                                <label for="date"> Date</label>
                                <select name='date' id="date" class="form-control">
                                    <option value="">Select</option>
                                    @for($i=1;$i<=31; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <p class="text-danger"> <strong>{{$errors->first('date')}}</strong></p>
                            </div>
                            <div class="col-md-2">
                                <label for="month"> Month</label>
                                <select name='month' id="month" class="form-control">
                                    <option value="">Select</option>
                                    @for($i=1;$i<=12; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <p class="text-danger"> <strong>{{$errors->first('month')}}</strong></p>
                            </div>
                            <div class="col-md-2">
                                <label for="year"> Year</label>
                                <select name='year' id="year" class="form-control">
                                    <option value="">Select</option>
                                    @for($i=1950;$i<=date('Y'); $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <p class="text-danger"> <strong>{{$errors->first('year')}}</strong></p>
                            </div>



                        </div>
                        <div class="form-group row">
                            <label for=""  class="col-md-4 col-form-label text-md-right">Profile</label> <div class="col-md-6">
                                <input type="file" name="profile_pic" id="profile_pic" class="form-control" >
                                <span class="text-danger"> <strong>{{$errors->first('profile_pic')}}</strong></span>

                            </div>  
                        </div>
                        <div class="form-group row">
                            <label for=""  class="col-md-4 col-form-label text-md-right">Hobby</label> 
                            <div class="col-md-6">
                                @if($hobbies)

                                @foreach($hobbies as $hobby)
                                <div class="form-check">
                                    <input type="checkbox" name="hobbies[]" id="hobbies_{{$hobby->id}}" value="{{$hobby->id}}" class="form-check-input hobbies" > 

                                    <label class="form-check-label">
                                        {{$hobby->name}}
                                    </label>
                                </div>
                                @endforeach
                                @endif
                                <span class="text-danger"> <strong>{{$errors->first('hobbies')}}</strong></span>

                            </div>  
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio"  name="gender" value="Male" {{(old('gender') == 'Male') ? 'checked' : ''}}> Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="Female" {{(old('gender') == 'Female') ? 'checked' : ''}}> Female
                                </label>
                                <br>
                                <span class="text-danger"> <strong>{{$errors->first('gender')}}</strong></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                <span class="text-danger"> <strong>{{$errors->first('password')}}</strong></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="about_me" class="col-md-4 col-form-label text-md-right">{{ __('About me') }}</label>
                            <div class="col-md-6">
                                <textarea id="about_me" name="about_me" class="form-control">{{old('about_me')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
