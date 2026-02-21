<?php

use Illuminate\Support\Facades\Route;

// Route par défaut - redirige vers la langue par défaut
Route::get('/', function () {
    return redirect('/' . app()->getLocale());
});

// Routes avec préfixe de langue
Route::prefix('{locale}')->where(['locale' => 'en|fr|ar'])->middleware('setlocale')->group(function () {
    
    // Page d'accueil publique
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // Routes d'authentification (gérées par Fortify)
    // Fortify va automatiquement créer les routes suivantes :
    // POST /login, POST /register, POST /logout, etc.

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


