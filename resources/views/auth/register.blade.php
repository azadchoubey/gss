@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header text-black text-center">
                    <div>
                        <img src="{{ asset('img/gss.png') }}" alt="GSS Logo" style="height: 150px;">
                    </div>
                </div>

                <div class="card-body p-4 p-sm-5">
                    <div class="text-center small mb-4">Enter Your Details To Register</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-4">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="John Doe">
                                    <label for="name"><i class="fas fa-user me-2"></i>{{ __('Full Name') }}</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                            <label for="email"><i class="fas fa-envelope me-2"></i>{{ __('Email Address') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                    <label for="password"><i class="fas fa-lock me-2"></i>{{ __('Password') }}</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    <label for="password-confirm"><i class="fas fa-key me-2"></i>{{ __('Confirm Password') }}</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#" class="text-decoration-none" style="color: #2e86de;">terms and conditions</a>
                            </label>
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn py-3 fw-bold text-uppercase text-white" style="background-color:#FC0015; border-color: #FC0015; box-shadow: 0 4px 6px rgba(255, 159, 67, 0.3);">
                                <i class="fas fa-user-plus me-2"></i>{{ __('Create Account') }}
                            </button>
                        </div>
                        
                        <div class="text-center">
                            <span class="small">Already have an account?</span>
                            <a class="small text-decoration-none" href="{{ route('login') }}" style="color: #2e86de;"> Sign In</a>
                        </div>
                    </form>
                </div>
                <div class="card-footer border-0 text-center" style="background-color: #f5f9ff;">
                    <div class="small text-muted">
                        <i class="fas fa-shield-alt me-1"></i> Your information is secure with us
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
