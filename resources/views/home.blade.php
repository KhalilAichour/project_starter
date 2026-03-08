@extends('layouts.app')

@section('title', __('messages.Welcome'))

@section('content')
<div class="container">
    
    <!-- Features Section -->
    <div class="row mb-5">
        <div class="card col border-0 shadow-sm card-hover card-active">
            <div class="card-body text-center">
                <i class="fas fa-plane fa-3x text-primary"></i>
                <h5 class="card-title">{{ __('messages.Flights') }}</h5>
                {{-- <p class="card-text">{{ __('messages.Book your next flight with ease.') }}</p> --}}
            </div>
        </div>
        <div class="card col border-0 shadow-sm card-hover">
            <div class="card-body text-center">
                <i class="fas fa-bed fa-3x text-success"></i>
                <h5 class="card-title">{{ __('messages.Hotels') }}</h5>
                {{-- <p class="card-text">{{ __('messages.Book your next hotel stay with ease.') }}</p> --}}
            </div>
        </div>
        <div class="card col border-0 shadow-sm card-hover">
            <div class="card-body text-center">
                <i class="fas fa-car fa-3x text-warning"></i>
                <h5 class="card-title">{{ __('messages.Cars') }}</h5>
                {{-- <p class="card-text">{{ __('messages.Book your next car rental with ease.') }}</p> --}}
            </div>
        </div>
    </div>

    <div class="row g-2 mb-3">
        <div class="col">
            <button type="button" class="btn-aller-retour btn-aller-retour-active">{{ __('messages.Return') }}</button>
            <button type="button" class="btn-aller-retour">{{ __('messages.One Way') }}</button>
            <button type="button" class="btn-aller-retour">{{ __('messages.Multiple Destinations') }}</button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingdeparture" placeholder="Departure">
                <label for="floatingdeparture"><i class="fas fa-plane-departure"></i> {{ __('messages.Departure') }}</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingdestination" placeholder="Destination">
                <label for="floatingdestination"><i class="fas fa-plane-arrival"></i> {{ __('messages.Destination') }}</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingdate" placeholder="Date(s)">
                <label for="floatingdate"><i class="fas fa-calendar-alt"></i> {{ __('messages.Date(s)') }}</label>
            </div>
        </div>

        <div class="col-sm-3">
            <select class="form-select form-select-lg mb-3" name="cabinClass" id="cabinClass">
                <option value="ECONOMY" selected>{{ __('messages.Economy') }}</option>
                <option value="PREMIUM_ECONOMY">{{ __('messages.Premium Economy') }}</option>
                <option value="BUSINESS">{{ __('messages.Business') }}</option>
                <option value="FIRST">{{ __('messages.First') }}</option>
            </select>
        </div>

        <div class="col-sm-3 mb-3">
            <button type="button" id="passengerModalButton" class="btn btn-lg" data-bs-toggle="modal" data-bs-target="#passagersModal">
                <i class="fa-solid fa-user"></i> {{ __('messages.Passenger(s)') }}
            </button>
        </div>

        <div class="col-sm-3 mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                <label class="form-check-label" for="switchCheckDefault">{{ __('messages.Direct Flights Only') }}</label>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-outline-primary" id="submitSearch" type="submit"><i class="fa-brands fa-sistrix"></i>{{ __('messages.Research') }}</button>
        </div>

    </div>

    {{-- Modal passagers --}}
    <div class="modal fade" id="passagersModal" data-bs-backdrop="true" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="passagersModalLabel">{{ __('messages.Passenger(s)') }}</h1>
            </div>
            <div class="modal-body">
                <table class="table table-borderless mb-1">
                    <tr>
                        <td>{{ __('messages.Adults') }}</td>
                        <td class="d-flex justify-content-end">
                            <div class="counter">
                                <button id="adultMinus" type="button" class="counter-btn minus-adult">−</button>
                                <input id="adultCount" type="number" class="counter-value-adult" value="1" disabled>
                                <button id="adultPlus" type="button" class="counter-btn plus-adult">+</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.Children') }} <small>(&lt;12)</small></td>
                        <td class="d-flex justify-content-end">
                            <div class="counter">
                                <button id="childMinus" type="button" class="counter-btn minus-child">−</button>
                                <input id="childCount" type="number" class="counter-value-child" value="0" disabled>
                                <button id="childPlus" type="button" class="counter-btn plus-child">+</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.Infants') }} <small>(&lt;2)</small></td>
                        <td class="d-flex justify-content-end">
                            <div class="counter">
                                <button id="infantMinus" type="button" class="counter-btn minus-infant">−</button>
                                <input id="infantCount" type="number" class="counter-value-infant" value="0" disabled>
                                <button id="infantPlus" type="button" class="counter-btn plus-infant">+</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" id="validatePassengers" class="btn btn-primary" data-bs-dismiss="modal">{{ __('messages.Valiadte') }}</button>
            </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
    

    <!-- Companies Section -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body p-4">
            <h3 class="text-center mb-4">{{ __('messages.Companies') }}</h3>
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
