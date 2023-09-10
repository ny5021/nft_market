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
                        <h1 class="fs-4 card-title fw-bold mb-4">{{ __('Register') }}</h1>
                        <form method="POST" class="needs-validation" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <small class="form-text invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>

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
                                <label class="mb-2 text-muted" for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <small class="form-text invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="mb-2 text-muted">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary ms-auto">
                                {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    @if (Route::has('login')) 
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                {{ __('Already have an account?') }} <a href="{{ route('login') }}" class="text-dark">{{ __('Login') }}</a>  
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
