@extends('layouts.auth_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class=" w3l-login-form">
                        <h2>{{__('register')}}</h2>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="w3l-form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                            <div class="group">
                                <i class="fas fa-user"></i>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                            <div class=" w3l-form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>
                            <div class="group">
                                <i class="fas fa-user"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                            <div class=" w3l-form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>

                            <div class="group">
                                <i class="fas fa-unlock"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                            <div class="w3l-form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('confirm_password') }}</label>

                            <div class="group">
                                <i class="fas fa-unlock"></i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                        <p class=" w3l-register-p">{{__('have_an_account')}}<a href="login" class="register"> {{__('login')}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
