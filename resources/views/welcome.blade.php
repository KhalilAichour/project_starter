@extends('layouts.app')

@section('title', __('Welcome'))

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <h1 class="display-4 fw-bold mb-4">{{ __('messages.Welcome to') }} {{ config('app.name') }}</h1>
            <p class="lead mb-4">{{ __('messages.A powerful Laravel application with multi-language support and modern authentication system.') }}</p>
            
            @guest
                <div class="d-flex gap-3">
                    <a href="{{ url(app()->getLocale() . '/login') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-sign-in-alt"></i> {{ __('messages.Login') }}
                    </a>
                    <a href="{{ url(app()->getLocale() . '/register') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-user-plus"></i> {{ __('messages.Register') }}
                    </a>
                </div>
            @else
                <a href="{{ route('dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-tachometer-alt"></i> {{ __('messages.Go to Dashboard') }}
                </a>
            @endguest
        </div>
        <div class="col-lg-6">
            <img src="https://via.placeholder.com/600x400/0d6efd/ffffff?text=Laravel+12" alt="Laravel" class="img-fluid rounded shadow">
        </div>
    </div>

    <!-- Features Section -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-shield-alt fa-3x text-primary"></i>
                    </div>
                    <h5 class="card-title">{{ __('messages.Secure Authentication') }}</h5>
                    <p class="card-text">{{ __('messages.Built with Laravel Fortify for robust security and user management.') }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-globe fa-3x text-success"></i>
                    </div>
                    <h5 class="card-title">{{ __('messages.Multi-Language') }}</h5>
                    <p class="card-text">{{ __('messages.Full support for English, French, and Arabic with RTL layout.') }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-bolt fa-3x text-warning"></i>
                    </div>
                    <h5 class="card-title">{{ __('messages.Modern Stack') }}</h5>
                    <p class="card-text">{{ __('messages.Powered by Laravel 12, Livewire, and Bootstrap for dynamic experiences.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Technologies Section -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body p-4">
            <h3 class="text-center mb-4">{{ __('messages.Technologies Used') }}</h3>
            <div class="row text-center">
                <div class="col-md-3">
                    <i class="fab fa-laravel fa-3x text-danger mb-2"></i>
                    <p class="fw-bold">Laravel 12</p>
                </div>
                <div class="col-md-3">
                    <i class="fab fa-bootstrap fa-3x text-primary mb-2"></i>
                    <p class="fw-bold">Bootstrap 5</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-bolt fa-3x text-warning mb-2"></i>
                    <p class="fw-bold">Livewire</p>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-lock fa-3x text-success mb-2"></i>
                    <p class="fw-bold">Fortify</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
