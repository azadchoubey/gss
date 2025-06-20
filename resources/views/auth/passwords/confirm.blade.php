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

                <div class="card-body p-4 p-sm-5">
                    <div class="text-center small mb-4">{{ __('Please Confirm Your Password Before Continuing') }}</div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-floating mb-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            <label for="password"><i class="fas fa-lock me-2"></i>{{ __('Password') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn py-3 fw-bold text-uppercase text-white" style="background-color:#FC0015; border-color: #FC0015; box-shadow: 0 4px 6px rgba(255, 159, 67, 0.3);">
                                <i class="fas fa-check-circle me-2"></i>{{ __('Confirm Password') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="small text-decoration-none" href="{{ route('password.request') }}" style="color: #2e86de;">
                                    <i class="fas fa-key me-1"></i>{{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="card-footer border-0 text-center" style="background-color: #f5f9ff;">
                    <div class="small text-muted">
                        <i class="fas fa-shield-alt me-1"></i> Security verification required
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
