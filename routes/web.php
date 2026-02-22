<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

// Route par défaut - redirige vers la langue par défaut
Route::get('/', function () {
    return redirect('/' . app()->getLocale());
});

Route::get('/login', fn() => redirect('/'.app()->getLocale().'/login'));
Route::get('/dashboard', fn() => redirect('/'.app()->getLocale().'/dashboard'));

// Routes avec préfixe de langue
Route::prefix('{locale}')->where(['locale' => 'en|fr|ar'])->middleware('setlocale')->group(function () {
    
    // Page d'accueil publique
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // Routes d'authentification Fortify
     // Login
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);


    // Routes protégées par authentification
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
});

// Route pour changer la langue (sans préfixe)
Route::get('/language/{locale}', function ($locale) {

    // dd(request());

    if (in_array($locale, config('app.available_locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');


