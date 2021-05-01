@extends('layouts.app')

@section('content')
<div class="container-fluid login-page d-flex justify-content-center align-content-center">
    <div class="row justify-content-center align-content-center">
        <div class="col">
            <div class="login-form p-5 container-fluid">
                <div class="py-2 row justify-content-center align-content-center">
                    <div class="col d-flex justify-content-center align-content-center">
                        <img src="{{ url('/assets/images/logo.png') }}" alt="">
                    </div>
                </div>
                <div class="row">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group justify-content-center align-items-center  row my-4">
                            <div class="col-md-9">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Login Id" required autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center align-items-center row my-4">
                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password"  required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       {{-- <div class="form-group justify-content-start row">
                            <div class="col-md-9 offset-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>--}}

                        <div class="form-group justify-content-center align-items-center row mb-3">
                            <div class="col-md-9 ">
                                <button type="submit" style="width: 100%" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <div class="justify-content-center align-items-center row">
                            <div class="col-md-9 ">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        {{--<div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                </div>
            </div>
        </div>--}}
    </div>
</div>
@endsection
