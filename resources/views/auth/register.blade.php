@extends('auth.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-body px-5">
                    <h1 class="text-center mb-4 mt-3">{{ __('Register') }}</h1>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- umur --}}
                        {{-- <div class="mb-3">
                            <label for="umur" class="form-label">{{ __('Umur') }}</label>
                            <input type="number" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" min="0" max="120" value="{{ old('umur') }}" required autocomplete="name" autofocus>

                            @error('umur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}

                        {{-- Kelas --}}
                        <div class="mb-3">
                            <label for="kelas" class="form-label">{{ __('Kelas') }}</label>
                            <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" required autocomplete="kelas" autofocus>

                            @error('kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mb-0 py-4">
                            <button type="submit" class="btn btn-white">{{ __('Register') }}</button>
                        </div>
                    </form>
                    <p class="text-center">Already have an account?<a style="color:rgb(87, 0, 149) " href="{{ route('login') }}"> Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
