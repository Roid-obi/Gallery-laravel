@extends('auth.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-body px-5">
                    <h1 class="text-center mt-3 mb-4">{{ __('Login') }}</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address :') }}</label>
                            <input id="email" type="email" class="in-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password :') }}</label>
                            <input id="password" type="password" class="in-text form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="btn btn-white">{{ __('Login') }}</button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-white" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>

                    </form>

                    <p class="text-center">Don't have an account?<a style="color:rgb(87, 0, 149) " href="{{ route('register') }}"> Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
