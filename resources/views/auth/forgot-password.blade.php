@extends('layouts.app')

@section('title', __('Forgot Password'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-key fa-3x text-warning mb-3"></i>
                        <h3 class="fw-bold">{{ __('messages.Forgot Password') }}</h3>
                        <p class="text-muted">{{ __('messages.Enter your email to reset your password') }}</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ url(app()->getLocale() . '/forgot-password') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('messages.Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input id="email" type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email" 
                                       autofocus
                                       placeholder="{{ __('messages.Enter your email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-warning btn-lg">
                                <i class="fas fa-paper-plane"></i> {{ __('messages.Send Password Reset Link') }}
                            </button>
                        </div>

                        <hr class="my-4">

                        <div class="text-center">
                            <a href="{{ url(app()->getLocale() . '/login') }}" class="text-decoration-none">
                                <i class="fas fa-arrow-left"></i> {{ __('messages.Back to Login') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
