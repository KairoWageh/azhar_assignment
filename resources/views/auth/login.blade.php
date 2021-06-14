@extends('layouts.auth_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class=" w3l-login-form">
                        <h2>{{__('login')}}</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class=" w3l-form-group">
                                <label>{{__('email')}}:</label>
                                <div class="group">
                                    <i class="fas fa-user"></i>
                                    <input type="email" name ="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('email')}}" required="required" />

                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class=" w3l-form-group">
                                <label>{{__('password')}}:</label>
                                <div class="group">
                                    <i class="fas fa-unlock"></i>
                                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="{{__('password')}}" required="required" />

                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="forgot">
                                <a href="#">{{__('forgot_password')}}</a>
                                <p><input type="checkbox">{{__('remember_me')}}</p>
                            </div>
                            <button type="submit">{{__('login')}}</button>

                        </form>
                        <p class=" w3l-register-p">{{__('donot_hava_account')}}<a href="register" class="register">
                            {{__('register')}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
