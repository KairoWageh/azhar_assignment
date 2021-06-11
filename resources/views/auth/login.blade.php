@extends('layouts.auth_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <h1>Material Login Form</h1>
                    <div class=" w3l-login-form">
                        <h2>Login Here</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class=" w3l-form-group">
                                <label>Email:</label>
                                <div class="group">
                                    <i class="fas fa-user"></i>
                                    <input type="email" name ="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required="required" />

                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class=" w3l-form-group">
                                <label>Password:</label>
                                <div class="group">
                                    <i class="fas fa-unlock"></i>
                                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" required="required" />

                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="forgot">
                                <a href="#">Forgot Password?</a>
                                <p><input type="checkbox">Remember Me</p>
                            </div>
                            <button type="submit">Login</button>

                        </form>
                        <p class=" w3l-register-p">Don't have an account?<a href="register" class="register"> Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
