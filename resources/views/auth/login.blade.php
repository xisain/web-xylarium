@extends('layouts.landingpage')

@section('content')
<section class="row justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container text-center">
        <div class="card shadow mx-auto bg-white" style="max-width: 400px; width: 100%;">
            <div class="card-header">
                <h3 class="">
                    <span class="text-capitalize text-muted">
                    {{ __('Login') }}
                    </span>
                </h3>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('login') }}" class="form-signin">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="mt-3 text-center">
                            <a class="text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
            <div class="card-footer">
                <span class="text-muted">Made By Xisain</span>
            </div>
        </div>
    </div>
</section>
@endsection
