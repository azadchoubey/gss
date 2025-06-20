@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header text-black text-center">
                    <div>
                        <img src="{{ asset('img/gss.png') }}" alt="GSS Logo" style="height: 150px;">
                    </div>
                </div>
                @if (session('errorMsg'))
                    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                        {{ session('errorMsg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body p-4 p-sm-5">
                    <div class="text-center small mb-4">Enter Your Credentials To Login</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-floating mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                            <label for="email"><i class="fas fa-envelope me-2"></i>{{ __('Email Address') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            <label for="password"><i class="fas fa-lock me-2"></i>{{ __('Password') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="small text-decoration-none" href="{{ route('password.request') }}" style="color: #2e86de;">
                                    <i class="fas fa-key me-1"></i>{{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn py-3 fw-bold text-uppercase text-white" style="background-color:#FC0015; border-color: #FC0015; box-shadow: 0 4px 6px rgba(255, 159, 67, 0.3);">
                                <i class="fas fa-sign-in-alt me-2"></i>{{ __('Sign In') }}
                            </button>
                        </div>
                        
                        @if (Route::has('register'))
                        <div class="text-center">
                            <span class="small">Don't have an account?</span>
                            <a class="small text-decoration-none" href="{{ route('register') }}" style="color: #2e86de;"> Create one!</a>
                        </div>
                        @endif
                    </form>
                </div>
                <div class="card-footer border-0 text-center" style="background-color: #f5f9ff;">
                    <div class="small text-muted">
                        <i class="fas fa-shield-alt me-1"></i> GSS - Secure Login
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
