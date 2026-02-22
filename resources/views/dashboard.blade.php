@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>{{ __('messages.Dashboard') }}</h2>
                <span class="badge bg-success">{{ __('messages.Authenticated') }}</span>
            </div>
        </div>
    </div>

    <!-- Welcome Card -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="card-title">
                        <i class="fas fa-hand-wave text-warning"></i> 
                        {{ __('messages.Welcome back') }}, {{ Auth::user()->name }}!
                    </h4>
                    <p class="card-text text-muted">
                        {{ __('messages.You are logged in and viewing your dashboard.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-start border-primary border-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">{{ __('messages.Total Users') }}</h6>
                            <h3 class="mb-0">{{ \App\Models\User::count() }}</h3>
                        </div>
                        <div class="text-primary">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-start border-success border-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">{{ __('messages.Account Status') }}</h6>
                            <h3 class="mb-0">{{ __('messages.Active') }}</h3>
                        </div>
                        <div class="text-success">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-start border-info border-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">{{ __('messages.Language') }}</h6>
                            <h3 class="mb-0">{{ config('app.locale_names.' . app()->getLocale()) }}</h3>
                        </div>
                        <div class="text-info">
                            <i class="fas fa-globe fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Information -->
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('messages.User Information') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th width="30%">{{ __('messages.Name') }}:</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('messages.Email') }}:</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('messages.Member Since') }}:</th>
                                <td>{{ Auth::user()->created_at->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('messages.Current Language') }}:</th>
                                <td>{{ config('app.locale_names.' . app()->getLocale()) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">{{ __('messages.Quick Actions') }}</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" type="button">
                            <i class="fas fa-user-edit"></i> {{ __('messages.Edit Profile') }}
                        </button>
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-key"></i> {{ __('messages.Change Password') }}
                        </button>
                        <button class="btn btn-outline-info" type="button">
                            <i class="fas fa-cog"></i> {{ __('messages.Settings') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
