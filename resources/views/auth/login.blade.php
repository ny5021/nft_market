@extends('layouts.app_login_register')

@section('content')

<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-5">
                    <img src="https://www.pngall.com/wp-content/uploads/13/NFT-No-Background.png" alt="logo" width="100">
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">{{ __('Login') }}</h1>
                        <form method="POST" class="needs-validation" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <small class="form-text invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">{{ __('Password') }}</label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="float-end">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <small class="form-text invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" class="form-check-label">{{ __('Remember Me') }}</label>
                                </div>
                                <button type="submit" class="btn btn-primary ms-auto">
                                {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    @if (Route::has('register')) 
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                {{ __("Don't have an account?") }} <a href="{{ route('register') }}" class="text-dark">{{ __('Register') }}</a>  
                            </div>
                        </div>
                    @endif
                </div>
                <div class="text-center mt-5 text-muted">
                    Copyright &copy; 2023 &mdash; NFT market
                </div>
            </div>
        </div>
    </div>
</section>

@endsection