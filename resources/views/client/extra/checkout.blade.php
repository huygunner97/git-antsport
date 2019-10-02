@extends('client.auth.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="logo">
                        <a href="{{ url('') }}">
                            <img src="{{ asset('public/images/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('checkout') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><i>*</i>{{ __('Họ tên') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="@if($user->name){{$user->name}}@else{{old('name')}}@endif" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right"><i>*</i>{{ __('Địa chỉ') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="@if($user->information &&  $user->information->address != ''){{$user->information->address}}@else{{old('address')}}@endif" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right"><i>*</i>{{ __('Điện thoại') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="@if($user->information &&  $user->information->phone != '')0{{$user->information->phone}}@else{{old('phone')}}@endif" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-submit">
                                    {{ __('Thanh toán') }}
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
